<?php
namespace Analysis;
use Analysis\Page;

class Metric
{
    /**
     * Metric title
     * @var string $title
     */
    protected $title;

    /**
     * Metric category title
     * @var string $category
     */
    protected $category = 'Technologies';

    /**
     * - pass
     * - moderate
     * - fail
     * - fyi
     * @var $pass_level
     */
    protected $pass_level = 'fyi';

    /**
     * - high
     * - medium
     * - low
     * @var $impact_level
     */
    protected $impact_level = 'medium';

    /**
     * - very-hard
     * - hard
     * - easy
     * @var $solve_level
     */
    protected $solve_level = 'easy';

    /**
     * @var string output of metric processing
     */
    protected $output;

    /**
     * Page being analyzed
     * @var Analysis/Page $page
     */
    protected $page;

    /**
     * Analysis processor
     * @var Analyzer $analyzer
     */
    protected $analyzer;

    /**
     * Translation class
     * @var Translation $analyzer
     */
    protected $translation;

    /**
     * @param \Analysis\Translation $translation
     */
    public function setTranslation($translation)
    {
        $this->translation = $translation;
    }

    /**
     * @param \Analysis\Analyzer $analyzer
     */
    public function setAnalyzer(Analyzer $analyzer)
    {
        $this->analyzer = $analyzer;
    }

    /**
     * @return \Analysis\Analyzer
     */
    public function getAnalyzer()
    {
        return $this->analyzer;
    }

    /**
     * @param \Analysis\Page $page
     */
    public function setPage(Page $page)
    {
        $this->page = $page;
    }

    /**
     * @return \Analysis\Page
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param  $impact_level
     */
    public function setImpactLevel($impact_level)
    {
        $this->impact_level = $impact_level;
    }

    /**
     * @return
     */
    public function getImpactLevel()
    {
        return $this->impact_level;
    }

    /**
     * @param  $pass_level
     */
    public function setPassLevel($pass_level)
    {
        $this->pass_level = $pass_level;
    }

    /**
     * @return
     */
    public function getPassLevel()
    {
        return $this->pass_level;
    }

    /**
     * @param  $solve_level
     */
    public function setSolveLevel($solve_level)
    {
        $this->solve_level = $solve_level;
    }

    /**
     * @return
     */
    public function getSolveLevel()
    {
        return $this->solve_level;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        $translation_key =  $this->_getKey().'_title';
        return $this->translation->translate($translation_key);
    }

    public function setOutput($output)
    {
        $this->output = $output;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    public function getOutput()
    {
        return $this->output;
    }

    public function getPassLevelText()
    {
        $translation_key =  $this->_getKey().'_'.$this->getPassLevel();
        return $this->translation->translate($translation_key);
    }

    public function process()
    {
        throw new Exception('Metric processing is not implemented');
    }

    private function _getKey()
    {
        $a = explode('\\', get_class($this));
        return end($a);
    }
}
