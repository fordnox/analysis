<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SocialImpact extends Metric
{
    protected $category         = 'Social Monitoring';
    protected $title            = 'Social Impact';
    protected $impact_level     = 'high';
    protected $solve_level      = 'hard';
    protected $pass_level       = 'fyi';

    public function process()
    {
        $analyzer = $this->getAnalyzer();
        $analyzer->getSocialDelicious();

$output=<<<EOL
<ul>
    <li>Facebook likes {$analyzer->getSocialFacebookLikes()}</li>
    <li>Facebook Comments {$analyzer->getSocialFacebookComments()}</li>
    <li>Facebook Shares {$analyzer->getSocialFacebookShares()}</li>
    <li>Delicious Bookmarks {$analyzer->getSocialDelicious()}</li>
    <li>Google+ {$analyzer->getSocialGplus()}</li>
    <li>LinkedIn {$analyzer->getSocialLinkedin()}</li>
    <li>Twitter backlinks {$analyzer->getSocialTweets()}</li>
    <li>Stumble upon {$analyzer->getSocialStumbleupon()}</li>
    <li>Pinterest {$analyzer->getSocialPinterest()}</li>
</ul>
EOL;

        $this->setPassLevel('pass');
        $this->setOutput($output);
    }
}
