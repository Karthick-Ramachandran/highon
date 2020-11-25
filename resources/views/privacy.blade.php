<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jobs on High - Terms and conditions</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Lora:wght@400;700&display=swap");

        :root {
            --bg-color-hsl: 59, 3%, 94%;
            --bg-color: hsl(var(--bg-color-hsl));
            --bg-color-translucent: hsla(var(--bg-color-hsl), 0.95);
            --bg-color-highlight: hsl(60, 90%, 50%);
            --color-text: hsl(192, 14%, 20%);
            --color-text-highlight: hsl(192, 14%, 0%);
            --page-width: 80ch;
            --paragraph-font-size: min(max(1.2rem, 4vw), 1.4rem);
            --header-font-size: min(max(2rem, 8vw), 4rem);
            --space: 2rem;
            --padding: 8vmin;
            --duration: 1s;
            --ease: cubic-bezier(0.25, 1, 0.5, 1);
        }

        .dark-mode {
            --bg-color-hsl: 0, 0%, 7%;
            --bg-color: hsl(var(--bg-color-hsl));
            --bg-color-translucent: hsla(var(--bg-color-hsl), 0.95);
            --bg-color-highlight: hsl(238, 70%, 40%);
            --color-text: hsl(0, 0%, 80%);
            --color-text-highlight: hsl(0, 0%, 100%);
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: "Lora", sans-serif;
            font-weight: 400;
            color: var(--color-text);
            background-color: var(--bg-color);
            -webkit-transition: background calc(var(--duration) / 4) var(--ease);
            transition: background calc(var(--duration) / 4) var(--ease);
        }

        header {
            display: -webkit-box;
            display: flex;
            -webkit-box-pack: justify;
            justify-content: space-between;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            margin: 0 auto;
            padding: calc(var(--space) / 2) var(--padding);
            width: 100%;
            max-width: var(--page-width);
            background-color: var(--bg-color-translucent);
            -webkit-transition: background calc(var(--duration) / 4) var(--ease);
            transition: background calc(var(--duration) / 4) var(--ease);
        }

        header .wrapper {
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
        }

        header .wrapper>*+* {
            margin-left: 4px;
        }

        select {
            font-family: inherit;
            font-size: 16px;
        }

        label {
            font-size: 0.8rem;
        }

        main {
            margin: 12rem auto;
            padding: 0 var(--padding);
            max-width: var(--page-width);
        }

        h1 {
            font-size: var(--header-font-size);
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 4rem;
        }

        p {
            margin: 2rem 0;
            font-size: var(--paragraph-font-size);
            line-height: 1.7;
        }

        .text-highlight {
            all: unset;
            background-repeat: no-repeat;
            background-size: 0% 100%;
            -webkit-transition: color calc(var(--duration) / 4) var(--ease), background-color calc(var(--duration) / 4) var(--ease), background-size var(--duration) var(--ease);
            transition: color calc(var(--duration) / 4) var(--ease), background-color calc(var(--duration) / 4) var(--ease), background-size var(--duration) var(--ease);
        }

        .text-highlight.active {
            color: var(--color-text-highlight);
            background-size: 100% 100%;
        }

        [data-highlight="background"] .text-highlight {
            background-image: -webkit-gradient(linear, left top, left bottom, from(var(--bg-color-highlight)), to(var(--bg-color-highlight)));
            background-image: linear-gradient(var(--bg-color-highlight), var(--bg-color-highlight));
        }

        [data-highlight="half"] .text-highlight {
            --line-size: 0.5em;
            background-image: -webkit-gradient(linear, left top, left bottom, from(transparent), to(var(--bg-color-highlight)));
            background-image: linear-gradient(transparent calc(100% - var(--line-size)), var(--bg-color-highlight) var(--line-size));
        }

        [data-highlight="underline"] .text-highlight {
            --line-size: 0.15em;
            background-image: -webkit-gradient(linear, left top, left bottom, from(transparent), to(var(--color-text)));
            background-image: linear-gradient(transparent calc(100% - var(--line-size)), var(--color-text) var(--line-size));
        }

        .text-highlight::before,
        .text-highlight::after {
            position: absolute;
            -webkit-clip-path: inset(100%);
            clip-path: inset(100%);
            clip: rect(1px, 1px, 1px, 1px);
            width: 1px;
            height: 1px;
            overflow: hidden;
            white-space: nowrap;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .text-highlight::before {
            content: " [highlight start] ";
        }

        .text-highlight::after {
            content: " [highlight end] ";
        }
    </style>

</head>

<body>


    <main>
        <h3>Welcome to Jobs on High - Privacy Policy</h3>
        <p>www.jobsonhigh.com built the jobs on high website as service site. This service is provided by www.jobsonhigh.com and is intended for use as is.
        </p>
        <p>This page is used to inform visitors regarding my policies with the collection, use, and disclosure of Personal Information if anyone decided to use my Service.
        </p>
        <p>If you choose to use my Service, then you agree to the collection and use of information in relation to this policy. The Personal Information that me collect is used for providing and improving the Service. me will not use or share your information with anyone except as described in this Privacy Policy.
        </p>
        <p>The terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, which is accessible at jobs on high unless otherwise defined in this Privacy Policy.
        </p>
        <p style="font-weight: bold">
            Information Collection and Use

        </p>

        <p>For a better experience, while using our Service, me may require you to provide us with certain personally identifiable information(add whatever else you collect here, e.g. users name, address, location, pictures) The information that me request will be (retained on your device and is not collected by me in any way)/(retained by us and used as described in this privacy policy).
        </p>

        <p>The app does use third party services that may collect information used to identify you.
        </p>
        <p style="font-weight: bold">
            Third party service providers used by the app are :

        </p>
        <p>Their Privacy Policy can be found on their websites
        </p>

        <p style="font-weight: bold">
            Log Data

        </p>

        <p>me want to inform you that whenever you use my Service, in a case of an error in the website me collect data and information (through third party products) on your phone called Log Data. This Log Data may include information such as your device Internet Protocol (“IP”) address, device name, operating system version, the configuration of the app when utilising my Service, the time and date of your use of the Service, and other statistics.
        </p>
        <p style="font-weight: bold">
            Cookies

        </p>
        <p>Cookies are files with a small amount of data that are commonly used as anonymous unique identifiers. These are sent to your browser from the websites that you visit and are stored on your device's internal memory.
        </p>
        <p>This Service does not use these “cookies” explicitly. However, the app may use third party code and libraries that use “cookies” to collect information and improve their services. You have the option to either accept or refuse these cookies and know when a cookie is being sent to your device. If you choose to refuse our cookies, you may not be able to use some portions of this Service.
        </p>

        <p>Security

            me value your trust in providing us your Personal Information, thus we are striving to use commercially acceptable means of protecting it. But remember that no method of transmission over the internet, or method of electronic storage is 100% secure and reliable, and me cannot guarantee its absolute security.

            Links to Other Sites

            This Service may contain links to other sites. If you click on a third-party link, you will be directed to that site. Note that these external sites are not operated by me . Therefore, me strongly advise you to review the Privacy Policy of these websites. me have no control over and assume no responsibility for the content, privacy policies, or practices of any third-party sites or services.</p>
        <p>Children’s Privacy

            These Services do not address anyone under the age of 13. me do not knowingly collect personally identifiable information from children under 13. In the case me discover that a child under 13 has provided me with personal information, me immediately delete this from our servers. If you are a parent or guardian and you are aware that your child has provided us with personal information, please contact me so that me will be able to do necessary actions.

            Changes to This Privacy Policy

            me may update our Privacy Policy from time to time. Thus, you are advised to review this page periodically (or should update the app and use updated version of app) for any changes. me will notify you of any changes by posting the new Privacy Policy on this page. These changes are effective immediately after they are posted on this page.

            Contact Us

            If you have any questions or suggestions about my Privacy Policy, do not hesitate to contact me.</p>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.1/ScrollTrigger.min.js"></script>
    <script>
        const highlight = document.getElementById("highlight-style");
        const mode = document.getElementById("mode");

        gsap.registerPlugin(ScrollTrigger);

        gsap.utils.toArray(".text-highlight").forEach((highlight) => {
            ScrollTrigger.create({
                trigger: highlight,
                start: "-100px center",
                onEnter: () => highlight.classList.add("active")
            });
        });

        const setHighlightStyle = (value) =>
            document.body.setAttribute("data-highlight", value);

        mode.addEventListener("click", (e) =>
            document.body.classList.toggle("dark-mode")
        );

        highlight.addEventListener("change", (e) => setHighlightStyle(e.target.value));

        setHighlightStyle(highlight.value);
    </script>
</body>

</html>
