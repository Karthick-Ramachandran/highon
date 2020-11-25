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
        <h3>Welcome to Jobs on High - Terms and Conditions</h3>
        <p>These terms and conditions outline the rules and regulations for the use of Jobs on High's Website, located at http://www.jobsonhigh.com</p>
        <p>By accessing this website we assume you accept these terms and conditions. Do not continue to use www.jobsonhigh.com if you do not agree to take all of the terms and conditions stated on this page.
        </p>
        <p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: "Client", "You" and "Your" refers to you, the person log on this website and compliant to the Company’s terms and conditions. "The Company", "Ourselves", "We", "Our" and "Us", refers to our Company. "Party", "Parties", or "Us", refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client’s needs in respect of provision of the Company’s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.
        </p>

        <p style="font-weight: bold">
            Cookie
        </p>

        <p>We employ the use of cookies. By accessing www.jobsonhigh.com, you agreed to use cookies in agreement with the Jobs on High's Privacy Policy.
        </p>
        <p>Most interactive websites use cookies to let us retrieve the user’s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.
        </p>
        <p style="font-weight: bold">
            Licence
        </p>

        <p>
            Unless otherwise stated, Jobs on High and/or its licensors own the intellectual property rights for all material on www.jobsonhigh.com. All intellectual property rights are reserved. You may access this from www.jobsonhigh.com for your own personal use subjected to restrictions set in these terms and conditions.

        </p>
        <p style="font-weight: bold">
            You must not:
        </p>
        <p>
            Republish material from www.jobsonhigh.com

        </p>

        <p>
            Sell, rent or sub-license material from www.jobsonhigh.com

        </p>
        <p>Reproduce, duplicate or copy material from www.jobsonhigh.com
        </p>
        <p>
            Redistribute content from www.jobsonhigh.com

        </p>
        <p>
            This Agreement shall begin on the date hereof.

        </p>
        <p>
            Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. Jobs on High does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of Jobs on High,its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws, Jobs on High shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.

        </p>
        <p>
            Jobs on High reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.

        </p>
        <p style="font-weight: bold">You warrant and represent that:
        </p>

        <p>You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;
        </p>
        <p>The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;
        </p>
        <p>The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy
        </p>
        <p>The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.
        </p>
        <p>
            You hereby grant Jobs on High a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.

            Hyperlinking to our Content

            The following organizations may link to our Website without prior written approval:

            Government agencies;

            Search engines;

            News organizations;

            Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and

            System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.

            These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party’s site.

            We may consider and approve other link requests from the following types of organizations:

            commonly-known consumer and/or business information sources;

            dot.com community sites;

            associations or other groups representing charities;

            online directory distributors;

            internet portals;

            accounting, law and consulting firms; and

            educational institutions and trade associations.

            We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses; (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of Jobs on High; and (d) the link is in the context of general resource information.

            These organizations may link to our home page so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party’s site.

            If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to Jobs on High. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.

            Approved organizations may hyperlink to our Website as follows:

            By use of our corporate name; or

            By use of the uniform resource locator being linked to; or

            By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party’s site.

            No use of Jobs on High's logo or other artwork will be allowed for linking absent a trademark license agreement.

            iFrames

            Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.

            Content Liability

            We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.

            Your Privacy

            Please read Privacy Policy

            Reservation of Rights

            We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it’s linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.

            Removal of links from our website

            If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.

            We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.

            Disclaimer

            To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:

            limit or exclude our or your liability for death or personal injury;

            limit or exclude our or your liability for fraud or fraudulent misrepresentation;

            limit any of our or your liabilities in any way that is not permitted under applicable law; or

            exclude any of our or your liabilities that may not be excluded under applicable law.

            The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.

            As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.
        </p>
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
