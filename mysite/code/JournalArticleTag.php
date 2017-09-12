<?php

class JournalArticleTag extends DataObject{
	/**
	 * @var array
	 */
	private static $db = array(
		'Title' => 'Varchar(255)',
	);

	/**
	 * @var array
	 */
	private static $belongs_many_many = array(
		'Articles' => 'JournalArticle',
	);

	/**
	 * @var array
	 */
	private static $extensions = array(
		'JournalArticleURLSegmentExtension',
	);

	/**
	 * {@inheritdoc}
	 */
	public function getCMSFields() {
		$fields = new FieldList(
			TextField::create('Title', _t('BlogTag.Title', 'Title'))
		);

		$this->extend('updateCMSFields', $fields);

		return $fields;
	}

	/**
	 * Returns a relative URL for the tag link.
	 *
	 * @return string
	 */
	public function getLink() {
		return 'tag/'.$this->URLSegment;
	}

}