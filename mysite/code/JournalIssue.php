<?php
class JournalIssue extends Page {

	private static $db = array(
		"Date" => "Text",
		"Number" => "Int",
		"OriginalPublicationDate" => "Date",
	);

	private static $has_one = array(
		"CoverImage" => "Image",
	);

	private static $plural_name = 'JournalIssues';
	private static $default_parent = "JournalIssueHolder";
	private static $can_be_root = false;

	private static $allowed_children = array('JournalArticle');

	//private static $icon = array("mysite/images/tree/toc","file");

	function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->removeByName('Content');
		$fields->addFieldToTab('Root.Main', new TextField('Number', 'Issue Number'));
		$fields->addFieldToTab('Root.Main', new TextField('Date', 'Issue Date'));

		return $fields;
	}

	public function getIssues(){
		return Issue::get()->filter(array('JournalIssue' => $this->Number));
	}

	public function getArticles() {
		return $this->Children();
	}

	public function getRandomArticles() {
		return SiteTree::get()->filter('ParentID', $this->ID)->sort('RAND()');
	}

	public function PreviousIssue() {
		// debug::show($this->IsFirstIssue());
		if($this->IsFirstIssue()){
			return false;
		}else{

			$issue = JournalIssue::get()->filter(array(
				'ParentID' => $this->ParentID,
				'Number:LessThan' => $this->Number
			))->sort('Number DESC')->First();
		}

		return $issue;
		
	}

	public function NextIssue() {
		if($this->IsLastIssue()){
			return false;
		}else{
			$issue = JournalIssue::get()->filter(array(
				'ParentID' => $this->ParentID,
				'Number:GreaterThan' => $this->Number
			))->sort('Number DESC')->Last();
		}
		
		return $issue;
	}

	public function IsFirstIssue(){
		$issueTest = JournalIssue::get()->filter(array(
			'ParentID' => $this->ParentID,
			'Number:LessThan' => $this->Number

		))->First();
		// Debug::show($issueTest);
		if($issueTest){
			return false;
		}else{
			return true;
		}
	}

	public function IsLastIssue(){
		$issueTest = JournalIssue::get()->filter(array(
			'ParentID' => $this->ParentID,
			'Number:GreaterThan' => $this->Number

		))->First();
		// Debug::show($issueTest);
		if($issueTest){
			return false;
		}else{
			return true;
		}
	}

}

class JournalIssue_Controller extends Page_Controller {

	public function init() {
		parent::init();
	}

}