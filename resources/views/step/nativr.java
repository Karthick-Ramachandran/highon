package com.apps.cultyvate1;

import android.app.Activity;
import android.app.AlertDialog;
import android.app.FragmentManager;
import android.app.FragmentTransaction;
import android.content.DialogInterface;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.util.Log;
import android.view.MenuItem;
import android.view.View;
import android.widget.CompoundButton;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.ListView;
import android.widget.Switch;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.DefaultRetryPolicy;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.UnsupportedEncodingException;
import java.util.ArrayList;

/**
 * Created by admin on 08-06-2018.
 */

public class IoTActivity extends Activity implements View.OnClickListener {

    ListView lvFarmLands;
    IoTAdapter iotAdapter;

    ArrayList<IoTFarmland> farmlandList;
    ArrayList<IoTBlock> blocksList;

    LinearLayout linlayFarmlands;

    String pumpStatus;

    int count[];
    int blockCount[];
    String blockStatus;

    RequestQueue queue;

    int farmlandIndex;

    TextView tvFarmName, tvGatewayName;

    LinearLayout linlayNoFarmsMsg, linlayFarmsList, linlayFarmName;

    ImageView ivGatewayStatus;

    LinearLayout linlayPreviousFarm, linlayNextFarm;

    LinearLayout linlayPumpControl, linlayPumpBlockContainer, linlayPumpControlContainer, linlayGeoTag, linlayGatewayName, linlayFarmlandDetails;
    ImageView ivPump, ivPumpFlash;
    Switch swPump;

    LinearLayout linlayFarmDetailsContainer, linlayBack;
    String errorMsg;

    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.iot_page);

        Toast.makeText(this, R.string.please_wait2, Toast.LENGTH_SHORT).show();

        queue = Volley.newRequestQueue(this);

        farmlandIndex = 0;

        //pump control layouts
        linlayPumpBlockContainer = (LinearLayout) findViewById(R.id.linlayPumpBlockContainer);
        linlayPumpControl = (LinearLayout) findViewById(R.id.linlayPumpControl);
        linlayPumpControlContainer = (LinearLayout) findViewById(R.id.linlayPumpControlBG);

        //Pump Images initiation
        ivPump = (ImageView) findViewById(R.id.ivPump);
        ivPump.setImageResource(R.drawable.iot_pump_grey);  //default -> false

        ivPumpFlash = (ImageView) findViewById(R.id.ivPumpFlash);
        ivPumpFlash.setImageResource(R.drawable.iot_pump_powergreen);   //default -> true

        //Pump Switch
        swPump = (Switch) findViewById(R.id.swPump);

        linlayFarmsList = (LinearLayout) findViewById(R.id.linlayFarmsList);
        linlayNoFarmsMsg = (LinearLayout) findViewById(R.id.linlayNoFarmsMsg);

        //layouts under Gateway Status
        linlayGeoTag = (LinearLayout) findViewById(R.id.linlayGeoTag);
        linlayGatewayName = (LinearLayout) findViewById(R.id.linlayGatewayName);
        linlayFarmlandDetails = (LinearLayout) findViewById(R.id.linlayFarmlandDetails);
        linlayFarmName = (LinearLayout) findViewById(R.id.linlayFarmName);

        //default status
        linlayPumpControlContainer.setVisibility(View.GONE);
        linlayFarmsList.setVisibility(View.VISIBLE);
        linlayNoFarmsMsg.setVisibility(View.GONE);
        linlayFarmName.setVisibility(View.VISIBLE);
        linlayGeoTag.setVisibility(View.VISIBLE);
        linlayGatewayName.setVisibility(View.VISIBLE);
        linlayFarmlandDetails.setVisibility(View.VISIBLE);

        lvFarmLands = (ListView) findViewById(R.id.lvFarmLands);
        linlayFarmlands = (LinearLayout) findViewById(R.id.linlayFarmlands);


        linlayFarmDetailsContainer = (LinearLayout) findViewById(R.id.linlayFarmDetailsContainer);

        linlayPreviousFarm = (LinearLayout) findViewById(R.id.linlayPreviousFarm);
        linlayNextFarm = (LinearLayout) findViewById(R.id.linlayNextFarm);

        linlayBack = (LinearLayout) findViewById(R.id.linlayBack);
        linlayBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
            }
        });

        tvFarmName = (TextView) findViewById(R.id.tvFarmName);
        tvGatewayName = (TextView) findViewById(R.id.tvGatewayName);

        ivGatewayStatus = (ImageView) findViewById(R.id.ivGatewayStatus);

        farmlandList = new ArrayList<IoTFarmland>();
        blocksList = new ArrayList<IoTBlock>();

        iotAdapter = new IoTAdapter(this, blocksList);

        lvFarmLands.setAdapter(iotAdapter);

        initFarmLandsList();

        linlayFarmlands.setOnClickListener(this);

        linlayPreviousFarm.setOnClickListener(this);
        linlayNextFarm.setOnClickListener(this);

        linlayFarmlandDetails.setOnClickListener(this);

        swPump.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                JSONObject params = new JSONObject();
                try {
                    if (swPump.isChecked()){
                        params.put("state","on");

                    } else {
                        params.put("state","off");
                    }

                    pumpAutomationApiCall(params);

                }catch (JSONException e){

                }


            }
        });

    }

    private void pumpAutomationApiCall(final JSONObject params) {
        RequestQueue queue = Volley.newRequestQueue(this);

        JsonObjectRequest postRequest = new JsonObjectRequest(Request.Method.POST, MainActivity.defs.iotPumpURL + MainActivity.defs.farmlandId + "/farmer-mobile/pump-message", params,
                new Response.Listener<JSONObject>() {
                    @Override
                    public void onResponse(JSONObject jsonObject) {
                        Log.d("Pump Automation", "onResponse: " + jsonObject);
                        String warning = "";
                        try {
                            if (params.getString("state").equals("off")) {
                                if (jsonObject.has("warnings")) {
                                    JSONArray jsonArray = jsonObject.getJSONArray("warnings");
                                    warning = jsonArray.getString(0);
                                } else if (jsonObject.has("message")) {
                                    warning = jsonObject.getString("message");
                                }
                            }

                            try {
                                if (params.getString("state").equals("on")) {
                                    if (jsonObject.has("error")) {
                                        warning = jsonObject.getString("error");
                                    } else if (jsonObject.has("errors")) {
                                        warning = jsonObject.getString("errors");
                                    } else {
                                        warning = jsonObject.getString("message");
                                        Toast.makeText(IoTActivity.this, "Pump on request is sent", Toast.LENGTH_SHORT).show();
                                        Toast.makeText(IoTActivity.this, "Wait for few min. and refresh the page", Toast.LENGTH_SHORT).show();
                                    }
                                }
                            } catch (JSONException e) {
                                e.printStackTrace();
                            }
                            Intent intent = new Intent(IoTActivity.this, PumpStatusChangedActivity.class);
                            intent.putExtra("PUMP_STATUS", params.toString());

                            if (!warning.equals("")) {
                                intent.putExtra("WARNING", warning);
                            }
                            startActivity(intent);
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError volleyError) {

                volleyError.printStackTrace();
                try {
                    String responseBody = new String(volleyError.networkResponse.data, "utf-8");
                    JSONObject data = new JSONObject(responseBody);
                    String warning = "";
                    if (data.has("warnings")) {
                        warning = data.getJSONArray("warnings").getString(0);
                    } else if (data.has("error")) {
                        warning = data.getString("error");
                    } else if (data.has("errors")) {
                        warning = data.getString("errors");
                    }
                    Intent intent = new Intent(IoTActivity.this, PumpStatusChangedActivity.class);
                    intent.putExtra("PUMP_STATUS", params.toString());
                    if (!warning.equals("")) {
                        intent.putExtra("WARNING", warning);
                    }
                    startActivity(intent);
                } catch (JSONException e) {
                } catch (UnsupportedEncodingException errorr) {
                }
            }
        });

        postRequest.setRetryPolicy(new DefaultRetryPolicy(
                MainActivity.defs.timeout,
                DefaultRetryPolicy.DEFAULT_MAX_RETRIES,
                DefaultRetryPolicy.DEFAULT_BACKOFF_MULT));
        queue.add(postRequest);

    }



    @Override
    protected void onResume() {
        super.onResume();
        initFarmLandsList();


    }

    private void initFarmLandsList() {
        if (new ConnCheck(this).isNetworkAvailable()) {
            farmlandList.clear();
            fetchIoTFarmlands();
            Log.d("Farmland", "runs");

        } else {
            Toast.makeText(this, R.string.no_net, Toast.LENGTH_SHORT).show();
        }
    }

    private void fetchIoTFarmlands() {

        final String url = MainActivity.defs.iotURL + MainActivity.defs.userID + "/telemetry/";

        Request<String> request = new StringRequest(Request.Method.GET, url,
                new Response.Listener<String>() {

                    @Override
                    public void onResponse(final String response) {
                        // Log.d("Response", response);

                        // Toast.makeText(FarmLandActivity.this, response, Toast.LENGTH_SHORT).show();
                        runOnUiThread(new Runnable() {
                            @Override
                            public void run() {

                                try {
                                    // JSONObject object = new JSONObject(MainActivity.defs.dummyIoTResponse);
                                    JSONObject object = new JSONObject(response);

                                    JSONArray farmlandsArray = object.getJSONArray("farmlands");
                                    blockCount = new int[farmlandsArray.length()];
                                    count = new int[farmlandsArray.length()];

                                    for (int i = 0; i < blockCount.length; i++) {
                                        blockCount[i] = 0;
                                    }

                                    for (int i = 0; i < count.length; i++) {
                                        count[i] = 0;
                                    }
                                    farmlandList.clear();
                                    for (int i = 0; i < farmlandsArray.length(); i++) {

                                        JSONObject curFarmland = farmlandsArray.getJSONObject(i);

                                        String farmlandName = curFarmland.getString("name");

                                        String gatewayName = "Gateway";
                                        String gatewayStatus = curFarmland.getString("gatewayStatus");
                                        String farmlandId = curFarmland.getString("farmlandId");

                                        String telemetryEnabled = curFarmland.getString("telemetryEnabled");

                                        pumpStatus = curFarmland.getString("currentStatus");

                                        String powerStatus = curFarmland.getString("powerStatus");

                                        JSONArray blocksArray = curFarmland.getJSONArray("blocks");

                                        ArrayList<IoTBlock> tempBlocksList = new ArrayList<IoTBlock>();

                                        blockCount[i] = blocksArray.length();
                                        for (int j = 0; j < blocksArray.length(); j++) {

                                            JSONObject curBlock = blocksArray.getJSONObject(j);

                                            //check if any plots in a block has
                                            if (curBlock.toString().contains("\"valve\":\"close\"") || curBlock.toString().contains("\"valve\": \"close\"")) {
                                                count[i]++;
                                                blockStatus = "close";

                                            }

                                            String blockName = curBlock.getString("name");

                                            String wateringStatus = curBlock.getString("wateringStatus");
                                            // String wateringStatus = "on";

                                            int numberOfProblems = curBlock.getInt("problemCount");
                                            // int numberOfProblems = 0;

                                            IoTBlock tempBlock = new IoTBlock(blockName, wateringStatus, numberOfProblems);

                                            JSONArray plotsArray = curBlock.getJSONArray("plots");

                                            ArrayList<IoTPlot> tempPlotsList = new ArrayList<IoTPlot>();

                                            for (int k = 0; k < plotsArray.length(); k++) {
                                                JSONObject curPlot = plotsArray.getJSONObject(k);

                                                String plotId = curPlot.getString(
                                                        "name");

                                                double batteryLevel = curPlot.getDouble("batteryPercentage");
                                                String deviceStatus = curPlot.getString("problem");

                                                String valve = curPlot.getString("valve");

                                                tempPlotsList.add(new IoTPlot(plotId, batteryLevel, deviceStatus, valve));
                                            }

                                            tempBlock.iotPlots = tempPlotsList;
                                            tempBlocksList.add(tempBlock);
                                        }

                                        IoTFarmland ioTFarmland = new IoTFarmland(farmlandName, gatewayName, gatewayStatus, farmlandId, telemetryEnabled, pumpStatus, powerStatus);
                                        ioTFarmland.blocksList = tempBlocksList;

                                        farmlandList.add(ioTFarmland);

                                    }

                                    populateUI();

                                } catch (JSONException e) {

                                    //start of error api linking

                                    errorMsg = e.toString();

                                    final String url2 = "http://devusersservice2.ap-south-1.elasticbeanstalk.com/api/message/error/";

                                    JSONObject params = new JSONObject();

                                    try {
                                        params.put("Module", "farmerapp");
                                        params.put("Message", url);
                                        params.put("MethodName", this.getClass().getName());
                                        params.put("RequestMetaData", errorMsg);

                                    } catch (Exception ex) {
                                        //Toast.makeText(this, "Invalid Error Post Response", Toast.LENGTH_SHORT).show();
                                    }
                                    JsonObjectRequest postRequest = new JsonObjectRequest(Request.Method.POST, url2, params,
                                            new Response.Listener<JSONObject>() {
                                                @Override
                                                public void onResponse(final JSONObject response) {

                                                }
                                            },
                                            new Response.ErrorListener() {
                                                @Override
                                                public void onErrorResponse(final VolleyError error) {
                                                    runOnUiThread(new Runnable() {
                                                        @Override
                                                        public void run() {

                                                        }
                                                    });
                                                }
                                            }
                                    );
                                    postRequest.setRetryPolicy(new

                                            DefaultRetryPolicy(
                                            MainActivity.defs.timeout,
                                            DefaultRetryPolicy.DEFAULT_MAX_RETRIES,
                                            DefaultRetryPolicy.DEFAULT_BACKOFF_MULT));

                                    queue.add(postRequest);
                                    //end of error api linking

                                    Toast.makeText(IoTActivity.this, e.toString(), Toast.LENGTH_SHORT).show();
                                }

                            }
                        });
                    }

                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError e) {
                // Log.d("Error.Response", e.toString());
                // Toast.makeText(FarmLandActivity.this, e.toString(), Toast.LENGTH_SHORT).show();
            }
        });

        // add it to the RequestQueue

        request.setRetryPolicy(new DefaultRetryPolicy(
                MainActivity.defs.timeout,
                DefaultRetryPolicy.DEFAULT_MAX_RETRIES,
                DefaultRetryPolicy.DEFAULT_BACKOFF_MULT));

        queue.add(request);
    }

    @Override
    public void onClick(View view) {
            switch (view.getId()) {

                case R.id.linlayFarmlands:

                    startActivity(new Intent("android.intent.action.FARMLANDACTIVITY"));
                    finish();

                    break;

                case R.id.linlayPreviousFarm:

                    if (farmlandList.size() == 0) {
//                    Toast.makeText(this, R.string.add_farm2, Toast.LENGTH_SHORT).show();

                    } else if (farmlandList.size() == 1) {
                        Toast.makeText(this, R.string.end_of_list, Toast.LENGTH_SHORT).show();

                    } else {
                        if (farmlandIndex >= 1) {
                            farmlandIndex--;

                            populateUI();


                        } else {
                            Toast.makeText(this, R.string.end_of_list, Toast.LENGTH_SHORT).show();
                        }

                    }

                    break;

                case R.id.linlayNextFarm:

                    if (farmlandList.size() == 0) {
                    } else if (farmlandList.size() == 1) {
                        Toast.makeText(this, R.string.end_of_list, Toast.LENGTH_SHORT).show();

                    } else {
                        if (farmlandIndex >= (farmlandList.size() - 1)) {
                            Toast.makeText(this, R.string.end_of_list, Toast.LENGTH_SHORT).show();
                        } else {
                                farmlandIndex++;
                                populateUI();

                        }
                    }
                    // Toast.makeText(getActivity().getApplicationContext(), "Next farm", Toast.LENGTH_SHORT).show();

                    break;

            }

    }

    private void populateUI() {

        // Toast.makeText(this, farmlandList.get(farmlandIndex).gateway, Toast.LENGTH_SHORT).show();
        if (farmlandIndex < farmlandList.size()) {

            pumpCheck();
            currentCheck();

            String pumpFarmlandID = farmlandList.get(farmlandIndex).farmlandId;
            MainActivity.defs.farmlandId = pumpFarmlandID;

            if (farmlandList.get(farmlandIndex).telemetryEnabled.equals("true")) {

                linlayPumpControlContainer.setVisibility(View.VISIBLE);

            } else if (farmlandList.get(farmlandIndex).telemetryEnabled.equals("false")) {

                linlayPumpControlContainer.setVisibility(View.GONE);
                linlayFarmsList.setVisibility(View.GONE);
                linlayNoFarmsMsg.setVisibility(View.VISIBLE);
                linlayFarmName.setVisibility(View.VISIBLE);

                linlayGeoTag.setVisibility(View.GONE);
                linlayGatewayName.setVisibility(View.GONE);
                linlayFarmlandDetails.setVisibility(View.GONE);

            }

            tvFarmName.setText(farmlandList.get(farmlandIndex).name);
            MainActivity.defs.currPumpFarmlandName = farmlandList.get(farmlandIndex).name;
            tvGatewayName.setText(farmlandList.get(farmlandIndex).gateway);

            if (farmlandList.get(farmlandIndex).gateway.equals("")) {
                tvGatewayName.setText("-");
            }

            if (farmlandList.get(farmlandIndex).gatewayStatus.equals("connected")) {

                ivGatewayStatus.setImageResource(R.drawable.rounded_corners_iv2);

            } else {

                ivGatewayStatus.setImageResource(R.drawable.rounded_corners_iv4);
            }

            if (farmlandList.get(farmlandIndex).telemetryEnabled.equals("false")) {

//          Toast.makeText(this, "result: "+farmlandList.get(farmlandIndex).telemetryEnabled, Toast.LENGTH_SHORT).show();

                linlayPumpControlContainer.setVisibility(View.GONE);
                linlayFarmsList.setVisibility(View.GONE);
                linlayNoFarmsMsg.setVisibility(View.VISIBLE);
                linlayFarmName.setVisibility(View.VISIBLE);

                linlayGeoTag.setVisibility(View.GONE);
                linlayGatewayName.setVisibility(View.GONE);
                linlayFarmlandDetails.setVisibility(View.GONE);

//                Toast.makeText(this, R.string.no_smart_irrigation_farms, Toast.LENGTH_SHORT).show();

            } else {
//            Toast.makeText(this, "result: "+farmlandList.get(farmlandIndex).telemetryEnabled, Toast.LENGTH_SHORT).show();

                linlayPumpControlContainer.setVisibility(View.VISIBLE);
                linlayFarmsList.setVisibility(View.VISIBLE);
                linlayNoFarmsMsg.setVisibility(View.GONE);
                linlayGeoTag.setVisibility(View.VISIBLE);
                linlayGatewayName.setVisibility(View.VISIBLE);
                linlayFarmlandDetails.setVisibility(View.VISIBLE);
                linlayFarmName.setVisibility(View.VISIBLE);
            }

            blocksList.clear();

            for (IoTBlock ioTBlock : farmlandList.get(farmlandIndex).blocksList) {
                blocksList.add(ioTBlock);
            }

            iotAdapter.notifyDataSetChanged();

            if (farmlandList.size() == 0) {
                linlayPumpControlContainer.setVisibility(View.GONE);
                linlayFarmsList.setVisibility(View.GONE);
                linlayNoFarmsMsg.setVisibility(View.VISIBLE);
                linlayFarmName.setVisibility(View.VISIBLE);

                linlayGeoTag.setVisibility(View.GONE);
                linlayGatewayName.setVisibility(View.GONE);
                linlayFarmlandDetails.setVisibility(View.GONE);

            }

            if (farmlandList.get(farmlandIndex).gatewayStatus.equals("") || farmlandList.get(farmlandIndex).gatewayStatus.equals("null")) {
                Toast.makeText(this, "no iot farms", Toast.LENGTH_SHORT).show();
                linlayPumpControlContainer.setVisibility(View.GONE);
                linlayFarmsList.setVisibility(View.GONE);
                linlayNoFarmsMsg.setVisibility(View.VISIBLE);
                linlayFarmName.setVisibility(View.VISIBLE);

                linlayGeoTag.setVisibility(View.GONE);
                linlayGatewayName.setVisibility(View.GONE);
                linlayFarmlandDetails.setVisibility(View.GONE);

//                Toast.makeText(this, R.string.no_smart_irrigation_farms, Toast.LENGTH_SHORT).show();
            }
        }
        else {
            linlayPumpControlContainer.setVisibility(View.GONE);
            linlayFarmsList.setVisibility(View.GONE);
            linlayNoFarmsMsg.setVisibility(View.VISIBLE);
            linlayFarmName.setVisibility(View.VISIBLE);
            linlayGeoTag.setVisibility(View.GONE);
            linlayGatewayName.setVisibility(View.GONE);
            linlayFarmlandDetails.setVisibility(View.GONE);

        }
    }

    private void currentCheck() {
            if (farmlandList.get(farmlandIndex).powerStatus.equals("on")) {
                ivPumpFlash.setImageResource(R.drawable.iot_pump_powergreen);

            } else if (farmlandList.get(farmlandIndex).powerStatus.equals("onePhaseFailure")) {
                ivPumpFlash.setImageResource(R.drawable.power_yellow);

            } else {
                ivPumpFlash.setImageResource(R.drawable.iot_pump_powerred);
            }

    }

    private void pumpCheck() {
            if (farmlandList.get(farmlandIndex).telemetryEnabled.equals("true")) {

                if (farmlandList.get(farmlandIndex).pumpStatus.equals("on")) {

                    swPump.setChecked(true);
                    MainActivity.defs.pumpStatus = farmlandList.get(farmlandIndex).pumpStatus;

                } else {
                    swPump.setChecked(false);
                    MainActivity.defs.pumpStatus = farmlandList.get(farmlandIndex).pumpStatus;

                }

            }


    }

}
