<?php

class VerifyPointOnGoogleCest
{
    public $countPage = 3;
    public const MAINGOOGLEURL = "/search?q=site:https://point.md/&start=%s";
    public const LISTOFLINKS = '//a[contains(@href,"https://point.md/") and not(contains(@href,"translate"))]';
    public const LISTOFTITLES = '//a[contains(@href,"https://point.md/") and not(contains(@href,"translate"))]//h3';
    public const LISTOFDESCRIPTION = '//div[contains(@style,"-webkit-line-clamp:2")]';

    public function Test(AcceptanceTester $I)
    {
        $urlList = [];
        $titlesList = [];
        $descriptionList = [];
        for ($i = 0; $i <= $this->countPage; $i++) {
            $I->amOnPage(self::MAINGOOGLEURL . $i);
            $urlList = $I->grabMultiple(self::LISTOFLINKS, 'href');
            $titlesList = $I->grabMultiple(self::LISTOFTITLES);
            $descriptionList = $I->grabMultiple(self::LISTOFDESCRIPTION);
        }
        var_dump($urlList);
        var_dump($titlesList);
        var_dump($descriptionList);
    }
}
