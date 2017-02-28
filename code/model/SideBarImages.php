<?php

class SideBarImages extends DataObject {

    private static $db = array (
        'SideBarImageTitle' => 'Text',
        'SideBarImageAlt' => 'Text',
        'SortOrder' => 'Int'
    );

    private static $has_one = array (
        'SideBarPhoto' => 'Image'
    );

    private static $summary_fields = array(
        'GridThumbnail' => 'Thumbnail Images',
        'SideBarImageTitle' => 'Title',
        'SideBarImageAlt' => 'Alt',
    );

    public function getGridThumbnail() {
        return $this->SideBarPhoto()->exists() ? $this->SideBarPhoto()->SetWidth(72) : "(no image)";
    }

    private static $default_sort='SortOrder';


    public function getCMSFields() {

        // gets parent fields
        $fields = parent::getCMSFields();

        $fields->addFieldToTab('Root.Main', TextField::create('SideBarImageTitle', 'Image Title'));
        $fields->addFieldToTab('Root.Main', TextField::create('SideBarImageAlt', 'Image Alt'));


        $fields->addFieldToTab('Root.Main', $uploader = UploadField::create('SideBarPhoto', 'Image'));

        $uploader->setFolderName('Uploads/Sidebar-Images');
        $uploader->getValidator()->setAllowedExtensions(array (
            'png','gif','jpeg','jpg'
        ));

        $fields->removeByName('SortOrder');
        $fields->removeByName('ParentID');

        // returns new fields
        return $fields;

    }


}

