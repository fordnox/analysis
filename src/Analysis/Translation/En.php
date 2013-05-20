<?php
namespace Analysis\Translation;
use Analysis\Translation;

class En extends Translation
{
    public $translation = array (
        'MobileLoadTime_title' => 'Mobile Load Time',
        'MobileLoadTime_fyi' => '<p>
            Try to load your website on a mobile device and measure the download time.
            If your website takes more than five seconds to download on a mobile device, you will lose 74 percent of
            your audience!
            Mobile usage is growing fast, especially in North America, where it will soon outpace desktop browsing usage.
            Make sure your site loads fast and that it looks nice on all types of mobile devices.
            Be sure to not use Flash, and keep photos and videos to a minimum.
            Here are two useful tips from GoogleTM for optimizing your mobile site speed.</p>',
        'MobileOptimization_title' => 'Mobile Optimization',
        'MobileOptimization_fyi' => '<p>Click each category for tips on how to optimize the mobile experience even further:</p>
        <ul>
            <li><a href="http://mobile.smashingmagazine.com/2010/07/19/how-to-use-css3-media-queries-to-create-a-mobile-version-of-your-website/#more-50749" target="_blank">Mobile CSS</a></li>
            <li><a href="http://www.bernskiold.com/2011/01/07/adding-an-iphoneipad-icon-for-your-website/" target="_blank">Apple Icon</a></li>
            <li><a href="http://www.sitepen.com/blog/2012/05/14/basic-mobile-layout/" target="_blank">Meta Viewport Tag</a></li>
            <li><a href="http://notixtech.com/blog/how-redirect-mobile-users-your-website" target="_blank">Mobile Redirection</a></li>
            <li><a href="http://blog.artversion.com/web-design-company/6-reasons-why-you-should-avoid-flash-sites-like-the-plague/" target="_blank">No Flash content</a></li>
        </ul>',
        'MobileRendering_title' => 'Mobile Rendering',
        'MobileRendering_fyi' => '<p>The number of people using the Mobile Web is huge; over 75 percent of consumers have access to smartphones. Your website should look nice on the most popular mobile devices.</p>
        <p>Tip: Use an analytics tool to track mobile usage of your website.</p>',
        'SecurityDirectoryBrowsing_title' => 'Directory Browsing',
        'SecurityDirectoryBrowsing_pass' => '<p>Great! Your server prevents visitors from browsing your directory by accessing it directly, this is excellent from a security standpoint.</p>',
        'SecurityDomainAvailability_title' => 'Domain Availability',
        'SecurityDomainAvailability_fyi' => '<p>Register the various extensions of your domain to protect your brand from cybersquatters.</p>',
        'SecurityDomainTypoAvailability_title' => 'Domain Typo Availability',
        'SecurityDomainTypoAvailability_fyi' => '<p>Register the various typos of your domain to protect your brand from cybersquatters.</p>',
        'SecurityEmailPrivacy_title' => 'Email Privacy',
        'SecurityEmailPrivacy_pass' => '<p>Malicious bots scrape the web in search of email addresses and plain text email addresses are more likely to be spammed.</p>',
        'SecurityIframeRendering_title' => 'Render in iframe',
        'SecurityIframeRendering_pass' => 'https://developer.mozilla.org/en-US/docs/HTTP/X-Frame-Options',
        'SecurityIframeRendering_fail' => 'https://developer.mozilla.org/en-US/docs/HTTP/X-Frame-Options',
        'SecuritySafeBrowsing_title' => 'Trust indicators',
        'SecuritySafeBrowsing_pass' => '<p>Great, your website is safe.</p>
        <p>No evidence of phishing and/or malware has been detected.</p>',
        'SecurityServerIp_title' => 'Server IP',
        'SecurityServerIp_fyi' => '<p>Your server\'s IP address has little impact on your SEO. Nevertheless, try to host your website on a server which is geographically close to your visitors. Search engines take the geolocation of a server into account as well as the server speed.</p>
        <p>Use DNSstuff for comprehensive reports on your server.</p>',
        'SecurityServerSignature_title' => 'Server Signature',
        'SecurityServerSignature_pass' => '<p>Good, your server signature is off. This is excellent from a security standpoint.</p>',
        'SecuritySpamBlock_title' => 'Spam Block',
        'SecuritySpamBlock_pass' => '<p>If you send email campaigns or transactional emails from your servers, you will quickly be flagged as a spammer. Use professional email software to keep your IP clean and improve the deliverability of your emails.</p>',
        'SecurityWhois_title' => 'Whois Privacy',
        'SecurityWhois_fail' => '<p>Website ownership records are available to the public. Contact your domain provider to request to make your domain records private. Depending on your industry, you may choose to keep your records public in order to increase your website\'s ownership credibility.</p>',
        'SecurityWot_title' => 'Trust indicators',
        'SecurityWot_pass' => '<p>This data is provided by WOT TM.</p>',
        'SeoAuthorityDomainExpiration_title' => 'Domain expiration',
        'SeoAuthorityDomainExpiration_pass' => '<p>Do you know that you can register your domain for up to 10 years? By doing so, you will show the world that you are serious about your business.</p>',
        'SeoAuthorityDomainExpiration_moderate' => '',
        'SeoAuthorityDomainExpiration_fail' => '',
        'SeoAuthorityDomainRegistration_title' => 'Domain 1st Registered',
        'SeoAuthorityDomainRegistration_pass' => '<p>Your domain is old enough to encourage search engines to give it a higher rank.</p>
        <p>Domain age matters to a certain extent and newer domains generally struggle to get indexed and rank high in search results for their first few months (depending on other associated ranking factors)</p>',
        'SeoAuthorityDomainRegistration_moderate' => '',
        'SeoAuthorityDomainRegistration_fail' => '',
        'SeoAuthorityIndexedPagesGoogle_title' => 'Indexed Pages',
        'SeoAuthorityIndexedPagesGoogle_pass' => '<p>This is the number of pages on your website that are indexed by GoogleTM.</p>
        <p>The more pages that search engines index, the better, as this offers more opportunity for your website to be found.</p>
        <p>A low number (relative to the total number of pages/URLs on your website) probably indicates that your internal link architecture needs improvement and is preventing search engines from crawling all of the pages on your website. You might want to create/check your site\'s XML sitemap and submit it to GoogleTM. You must also build backlinks to your site\'s internal pages to help GoogleTM bots crawl and index your web pages.</p>
        <p>Check GoogleTM Webmaster Tools under Health and Index Status, to keep track of the status of your site\'s indexed pages.</p>',
        'SeoAuthorityIndexedPagesGoogle_moderate' => '',
        'SeoAuthorityIndexedPagesGoogle_fail' => '',
        'SeoAuthorityPagerank_title' => 'Pagerank',
        'SeoAuthorityPagerank_pass' => '<p>Your website\'s PageRank is impressive.</p>
        <p>PageRankTM (commonly called PR) is a link analysis algorithm used by GoogleTM to assess the popularity/authority of a website. The PageRank goes from 0 to 10. New websites start at PR0 and authority websites, like Twitter.com, have a PR10.</p>
        <p>Websites with a high PageRankTM are crawled more frequently and their outgoing links have more passing juice.</p>',
        'SeoAuthorityPagerank_moderate' => '',
        'SeoAuthorityPagerank_fail' => '',
        'SeoAuthorityPopularPages_title' => 'Popular Pages',
        'SeoAuthorityPopularPages_fyi' => '<p>This lists your website\'s popular pages.</p>',
        'SeoBacklinksCounter_title' => 'Counter',
        'SeoBacklinksCounter_pass' => '<p>Backlinks are links that point to your website from other websites. They are like letters of recommendation for your site.</p>
        <p>Since this factor is crucial to SEO, you should have a strategy to improve the quantity and quality of backlinks.</p>',
        'SeoBacklinksCounter_fail' => '<p>Bad, no backlinks found.</p>',
        'SeoBacklinksDmoz_title' => 'DMOZ',
        'SeoBacklinksDmoz_pass' => '<p>Your website is listed in DMOZ, a multilingual open content directory constructed and maintained by a community of volunteer editors.</p>
        <p>Make sure your company\'s title and description are up-to-date because search engines take DMOZ listings into account.</p>',
        'SeoBacklinksDmoz_fail' => '<p>Bad, not listed on DMOZ.</p>',
        'SeoBasicsIpCanonicalization_title' => 'IP Canonicalization',
        'SeoBasicsIpCanonicalization_pass' => '<p>Good, your website\'s IP address is forwarding to your website\'s domain name.</p>
        <p>To check this for your website, enter your IP address in the browser and see if your site loads with the IP address. Ideally, the IP should redirect to your website\'s URL or to a page from your website hosting provider.</p>
        <p>If it does not redirect, you should do an htaccess 301 redirect to make sure the IP does not get indexed.</p>',
        'SeoBasicsIpCanonicalization_fail' => 'todo',
        'SeoBasicsRobotsTxt_title' => 'robots.txt',
        'SeoBasicsRobotsTxt_pass' => '<p><a href=\'http://tool.motoricerca.info/robots-checker.phtml\' target=\'_blank\'>Click here</a> to check your robots.txt file for syntax errors.</p>',
        'SeoBasicsRobotsTxt_fail' => '<p>Your website doesn\'t have a <a href=\'http://www.google.com/robots.txt\'>robots.txt file</a> - this can be problematic.</p>
        <p>A <a href=\'http://www.robotstxt.org/orig.html\' target=\'_blank\'>robots.txt</a> file allows you to restrict the access of search engine robots that crawl the web and it can prevent these robots from
        accessing specific directories and pages. It also specifies where the XML sitemap file is located.</p>
        <p><a href=\'http://tool.motoricerca.info/robots-checker.phtml\' target=\'_blank\'>Click here</a> to check your robots.txt file for syntax errors.</p>',
        'SeoBasicsSitemap_title' => 'XML Sitemap',
        'SeoBasicsSitemap_pass' => '<p>Great, your website has an <a href=\'http://en.wikipedia.org/wiki/Sitemaps\'>XML sitemap</a>.</p>
        <p>A sitemap lists URLs that are available for crawling and can include additional information like your site\'s latest updates, frequency of changes and importance of the URLs. This allows search engines to crawl the site more intelligently.</p>',
        'SeoBasicsSitemap_fail' => '<p>Your website does not have XML Sitemap.</p>
        <p>A sitemap lists URLs that are available for crawling and can include additional information like your site\'s latest updates, frequency of changes and importance of the URLs. This allows search engines to crawl the site more intelligently.</p>',
        'SeoBasicsUnderscoresInUrls_title' => 'Underscores in the URLs',
        'SeoBasicsUnderscoresInUrls_pass' => '<p>Great, you are not using underscores (these_are_underscores) in your URLs. While GoogleTM treats hyphens (these-are-hyphens) as word separators, it does not treat underscores as word separators.</p>',
        'SeoBasicsUnderscoresInUrls_fail' => '',
        'SeoBasicsUrlRewrite_title' => 'URL Rewrite',
        'SeoBasicsUrlRewrite_pass' => '<p>Great! You have clean (user-friendly) URLs which do not contain query strings.</p>
        <p>Clean URLs are not only <a href=\'http://support.google.com/webmasters/bin/answer.py?hl=en&answer=1235687\' target=\'_blank\'>SEO-friendly</a> but are also important for usability.</p>',
        'SeoBasicsUrlRewrite_fail' => 'todo',
        'SeoBasicsWwwResolve_title' => 'WWW Resolve',
        'SeoBasicsWwwResolve_pass' => '<p>Great, your website directs www.www.google.com and www.google.com to the same URL.</p>
        <p><a href=\'http://support.google.com/webmasters/bin/answer.py?hl=en&answer=44231\' target=\'_blank\'>Redirecting requests</a> from a non-preferred domain is important because search engines consider URLs with and without "www" as two different websites.</p>',
        'SeoBasicsWwwResolve_fail' => 'todo',
        'SeoContentBlog_title' => 'Blog',
        'SeoContentBlog_pass' => '<p>Starting a blog is a great way to <a href=\'http://www.adherecreative.com/blog/bid/118065/3-Direct-Benefits-of-Small-Business-Blogging\'>boost your SEO</a> and attract qualified visitors.</p>
        <p>Use these <a href=\'http://socialmediatoday.com/wenbryant/508225/10-b2b-tips-promote-your-blog/\'>great tips</a> to boost the SEO performance of your blog.</p>',
        'SeoContentBlog_fail' => '<p>Bad, Blog not found.</p>',
        'SeoContentDescription_title' => 'Description',
        'SeoContentDescription_pass' => '<p>Great, your title contains between 10 and 70 characters.</p>
        <p>Make sure your title is explicit and contains your <a href=\'http://usabilitygeek.com/15-title-tag-optimization-guidelines-for-usability-and-seo\' target=\'_blank\'>most important keywords</a>. </p>
        <p>Be sure that each page has a unique title.</p>',
        'SeoContentDescription_fail' => '<p>Your meta description should contain between 70 and 160 characters (spaces included).</p>
       <p>Meta descriptions allow you to influence how your web pages are described and displayed in search results. A good description acts as a
potential organic advertisement and encourages the viewer to click through to your site.</p>
<p>Ensure that your meta description is explicit and contains your most important keywords. Also, each page should have a unique meta description relevant to the content of that page.</p>',
        'SeoContentFlash_title' => 'Flash',
        'SeoContentFlash_pass' => '<p>Good, no Flash content has been detected on this page.</p>
        <p>Flash should only be used for specific enhancements. Although Flash content often looks nicer, it cannot be <a href=\'http://support.google.com/webmasters/bin/answer.py?hl=en&answer=72746\' target=\'_blank\'>properly indexed</a> by search
        engines. Avoid full Flash websites to maximize SEO.</p>
        <p>This advice also applies to <a href=\'http://en.wikipedia.org/wiki/Ajax_(programming)\' target=\'_blank\'>AJAX</a>.</p>',
        'SeoContentFlash_fail' => 'Bad, Flash content was detected on this page.
        Flash should only be used for specific enhancements. Although Flash content often looks nicer, it cannot be properly indexed by search
        engines. Avoid full Flash websites to maximize SEO. This advice also applies to AJAX.',
        'SeoContentFrames_title' => 'Frames',
        'SeoContentFrames_pass' => '<p>Great, there are no frames detected on this page.</p>
        <p>Frames can cause problems on your web page because search engines will not crawl or index the content within them.</p>
        <p>Avoid frames whenever possible and use a NoFrames tag if you must use them.</p>',
        'SeoContentFrames_fail' => 'Bad, Frames were detected on this page.',
        'SeoContentHeadings_title' => 'Headings',
        'SeoContentHeadings_pass' => '<p>Great, your website is structured using HTML headings (H1 to H6).</p>
        <p>Use your keywords in the headings and make sure the first level (H1) includes your most important keywords. Never duplicate your title tag content in your header tag.</p>
        <p>For more effective SEO, use only one H1 tag per page.</p>',
        'SeoContentHeadings_fail' => '',
        'SeoContentImages_title' => 'Images',
        'SeoContentImages_pass' => '<p>Good, most or all of your images have alternative text (the alt attribute).</p>
        <p>Alternative text describes your images so they can appear in GoogleTM Images search results.</p>',
        'SeoContentImages_fail' => '',
        'SeoContentMetaKeywords_title' => 'Meta Keywords',
        'SeoContentMetaKeywords_fyi' => '<p>Meta keywords are used to indicate keywords that are relevant to your website\'s content. Because search engine spammers have abused this tag, however, it provides little to no benefit to your search rankings.</p>
        <p>You can safely avoid the use of this tag for new web pages. For existing web pages, make sure the meta keywords do not appear to be spammy.</p>',
        'SeoContentTextHtmlRatio_title' => 'Text/HTML Ratio',
        'SeoContentTextHtmlRatio_pass' => '<p>Great, html and text ratio is perfect.</p>',
        'SeoContentTextHtmlRatio_fail' => '<p>This page\'s ratio of text to HTML code is below 15 percent, this means that your website probably needs more text content.</p>
        <p>A ratio between 25 and 70 percent is ideal. When it goes beyond than that, the page might run the risk of being considered spam.</p>
        <p>As long as the content is relevant and gives essential information, it is a plus to have more of it.</p>',
        'SeoContentTitle_title' => 'Title',
        'SeoContentTitle_pass' => '<p>Great, your title contains between 10 and 70 characters.</p>
        <p>Make sure your title is explicit and contains your <a href=\'http://usabilitygeek.com/15-title-tag-optimization-guidelines-for-usability-and-seo\' target=\'_blank\'>most important keywords</a>. </p>
        <p>Be sure that each page has a unique title.</p>',
        'SeoContentTitle_fail' => '',
        'SeoKeywordsCloud_title' => 'Cloud',
        'SeoKeywordsCloud_fyi' => '<p>This Keyword Cloud provides an idea of your most frequently recurring keywords. They are likely to be the keywords with the greatest probability of ranking high in the search engines.</p>',
        'SeoKeywordsCompetitorsGoogle_title' => 'Competitors in Google',
        'SeoKeywordsCompetitorsGoogle_fyi' => '<p>This is an estimation of the websites who are ranking above yours in the organic search results in GoogleTM. You can consider that these websites are your online competitors since they are ranking high with the same keywords as yours.</p>
        <p>We recommend that you visit these websites and conduct an in-depth analysis of them in order to understand why they are ranking high. This will help you learn about your market and your keywords.</p>
        <p>This data is provided by SEMRushTM.</p>',
        'SeoKeywordsConsistency_title' => 'Consistency',
        'SeoKeywordsConsistency_moderate' => '<p>This table highlights the importance of being consistent with your use of keywords. To improve the chance of ranking high in search results with a specific keyword, you should use the most important keywords consistently in your content, title, description, H titles, internal links anchor text and backlinks anchor text.</p>',
        'SeoKeywordsGoogleRanking_title' => 'Google Ranking',
        'SeoKeywordsGoogleRanking_pass' => '<p>Your website ranks highest with these keywords.</p>
        <p>This data is provided by SEMRushTM.</p>',
        'SocialImpact_title' => 'Social Impact',
        'SocialImpact_fyi' => '<p>The impact of social media is huge for certain industries.</p>
        <p>Learn how to further engage your social media audiences and create a consistent fan base. Check these helpful tools for managing your social media campaign.</p>
        <p>Note: This data represents social media influences from your website\'s URL, it does not represent data from specific brand pages.</p>',
        'TechnologiesDoctype_title' => 'Doctype',
        'TechnologiesDoctype_fyi' => '<p>Declaring a doctype helps web browsers to render content correctly.</p>',
        'TechnologiesEncoding_title' => 'Encoding',
        'TechnologiesEncoding_pass' => '<p>Great, language/character encoding is specified.</p>
        <p>Specifying language/character encoding can prevent problems with the rendering of special characters.</p>',
        'TechnologiesGoogleAnalytics_title' => 'Google Analytics',
        'TechnologiesGoogleAnalytics_fyi' => '<p>Web analytics let you measure visitor activity on your website. You should have at least one analytics tool installed. It is also good to install one extra tool to have a confirmation of the results.</p>
        <p>Analytics Tools: GoogleTM Analytics, QuantcastTM, SiteCatalystTM, PiwikTM, chartbeatTM, ClickyTM, ClickTaleTM, etc.</p>',
        'TechnologiesSpeed_title' => 'Speed Tips',
        'TechnologiesSpeed_pass' => '<p>Website speed has a huge effect on SEO. Speed-up your website so search engines will reward you by sending more visitors.</p>
        <p>Also, conversion rates are far higher for websites that load faster than their slower competitors.</p>',
        'TechnologiesTechnologies_title' => 'Technologies',
        'TechnologiesTechnologies_fyi' => '<p>Get to know the technologies used for your website. Some codes might slow down your website. Ask your webmaster to take a look at this.</p>',
        'TechnologiesW3CValidity_title' => 'W3C Validity',
        'TechnologiesW3CValidity_fail' => '<p>Use valid markup that contains no errors. Syntax errors can make your page difficult for search engines to index. To fix the detected errors, run the W3C validation service.</p>
        <p>W3C is a consortium that sets web standards.</p>',
        'Usability404Page_title' => '404 Page',
        'Usability404Page_fail' => '<p>Apparently your site does not have a 404 Error Page - this is bad in terms of usability.<p>
        <p>Take the opportunity to provide visitors with a beautiful and helpful 404 Error Page to increase user retention.</p>',
        'UsabilityConversionForms_title' => 'Conversion Forms',
        'UsabilityConversionForms_pass' => '<p>Good. Signup form found</p>',
        'UsabilityConversionForms_fail' => '<p>Add a conversion form for repeat visitors. It could be used to sign up for a subscription, get an email address of a visitor or close an online sale. Converting visitors into prospects/clients is probably the most important goal for your website.</p>
        <p>After adding a conversion form to your site, it is important that you optimize your website to boost conversions.</p>',
        'UsabilityDublinCore_title' => 'Dublin Core',
        'UsabilityDublinCore_pass' => '<p>great</p>',
        'UsabilityDublinCore_fail' => '<p>This page does not take advantage of Dublin Core.</p>
        <p>Dublin Core is a set of standard metadata elements used to describe the contents of a website. It can help with some internal search engines and it does not bloat your code.</p>',
        'UsabilityFavicon_title' => 'Favicon',
        'UsabilityFavicon_pass' => '<p>Great, your website has a favicon. Make sure this favicon is consistent with your brand.</p>
        <p>Resource: Check out this amazing idea for improving the user experience with a special favicon.</p>',
        'UsabilityFavicon_fail' => '<p>No favicon found.</p>',
        'UsabilityLanguage_title' => 'Language',
        'UsabilityLanguage_pass' => '<p>Great, you have declared the language.
Make sure your declared language is the same as the language detected by GoogleTM. Tips for multilingual websites:
Define the language of the content in each page\'s HTML code.
Specify the language code in the URL as well (e.g., mywebsite.com/fr/mycontent.html).</p>',
        'UsabilityLanguage_fail' => '<p>fail.</p>',
        'UsabilityLoadTime_title' => 'Load Time',
        'UsabilityLoadTime_pass' => '<p>Your website is fast. Well done.</p>
        <p>Site speed is becoming an important factor for ranking high in GoogleTM search results and enriching the user experience. Resources: Check out GoogleTM\'s developer tutorialsfor tipson how to to make your website run faster.</p>
        <p>Monitor your server and receive SMS alerts when your website is down with a web monitoring service.</p>',
        'UsabilityMicroformats_title' => 'Microformats',
        'UsabilityMicroformats_pass' => '<p>great</p>',
        'UsabilityMicroformats_fail' => '<p>This page does not take advantage of Microformats.</p>
        <p>A microformat is a technical semantic markup that can be used to better structure the data submitted to search engines. Thanks to microformats, GoogleTM regularly improves its presentation of search results.</p>',
        'UsabilityOpenGraph_title' => 'Open Graph',
        'UsabilityOpenGraph_pass' => '<p>great</p>',
        'UsabilityOpenGraph_fail' => '<p>https://developers.facebook.com/docs/opengraph/</p>',
        'UsabilityPageSize_title' => 'Page Size',
        'UsabilityPageSize_fyi' => '<p>Two of the main reasons for an increase in page size are images and JavaScript files.</p>
        <p>Page size affects the speed of your website; try to keep your page size below the global average. Tip: Use images with a small size and optimize their download with gzip.</p>',
        'UsabilityUrl_title' => 'URL',
        'UsabilityUrl_fyi' => '<p>Keep your URLs short and avoid long domain names when possible.</p>
        <p>A descriptive URL is better recognized by search engines. A user should be able to look at the address bar and make an accurate guess about the content of the page before reaching it (e.g., http://www.mysite.com/en/products).</p>
        <p>Keep in mind that URLs are also an important part of a comprehensive SEO strategy. Use clean URLs to make your site more <em>crawlable</em> by GoogleTM.</p>
        <p>Resource: Search for a good domain name. If no good names are available, consider a second hand domain. To prevent brand theft, you might consider trademarking your domain name.</p>',
        'VisitorsAdwordsTraffic_title' => 'Adwords Traffic',
        'VisitorsAdwordsTraffic_fyi' => '<p>This is an estimation of the traffic that is being bought through AdWordsTM vs. unpaid Organic Traffic.</p>
        <p>This data is provided by SEMRushTM.</p>',
        'VisitorsDistinctiveAudience_title' => 'Distinctive Audience',
        'VisitorsDistinctiveAudience_fyi' => '<p>Relative to the general internet population, the above audience is over-represented at mailchimp.com. This data is provided by AlexaTM.</p>',
        'VisitorsLocalization_title' => 'Visitors Localization',
        'VisitorsLocalization_fyi' => '<p>We recommend that you book the domain names for the countries where your website is popular. This will prevent potential competitors from registering these domains and taking advantage of your reputation in such countries.</p>',
        'VisitorsTrafficEstimations_title' => 'Traffic Estimations',
        'VisitorsTrafficEstimations_fyi' => '<p>We use multiple tools to estimate web traffic, including Google™ Trends and Alexa™.</p>
        <p>Nevertheless, your analytics will provide the most accurate traffic data.</p>',
        'VisitorsTrafficRank_title' => 'Traffic Rank',
        'VisitorsTrafficRank_fyi' => '<p>A low rank means that your website gets a lot of visitors.</p>
        <p>Your Alexa Rank is a good estimate of the worldwide traffic to your website, although it is not 100 percent accurate. Reviewing the most visited websites by country can give you valuable insights.</p>
        <p>Quantcast provides similar services.</p>',
    );
}