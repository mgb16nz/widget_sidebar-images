<?php
/**
 * Created by Snap Web Designs.
 * User: Mark Barker
 * Date: 12/02/17
 */

class SideBarImagesWidget extends Widget
{
    /**
     * @var string
     */
    private static $title = '';

    /**
     * @var string
     */
    private static $cmsTitle = 'Sidebar Images';

    /**
     * @var string
     */
    private static $description = 'Displays an image or images in the right sidebar';

    /**
     * @var array
     */
    private static $db = array(
        'ImagesToShow' => 'Int'
    );

    /**
     * @var array
     */
    private static $defaults = array(
        'NumberOfImages' => 1
    );

    /**
     * @var array
     */
    private static $has_one = array(
        'SideBarImages' => 'SideBarImages',
    );

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $this->beforeUpdateCMSFields(function ($fields) {

            /**
             * @var FieldList $fields
             */
            $fields->merge(array(

                NumericField::create(
                    'DaysToShow', _t('SideBarImagesWidget.ImagesToShow.Label', 'Images Displayed'), 0
                )
                    ->setDescription(_t('SideBarImagesWidget.ImagesToShow.Description', 'Images to be displayed (set to 0 to show all Images).'))
            ));
        });

        return $fields;
    }


    /**
     * @return DataList
     */
    public function SidebarImages()
    {
        return SidebarImages::get();
    }

}

class SideBarImagesWidget_Controller extends Widget_Controller {

    /**
     *
     */
    function init() {
        parent::init();

        // Requirements for CSS
        Requirements::css('widget_sidebar-images/owlcarousel/css/owl.carousel.min.css');
        Requirements::css('widget_sidebar-images/owlcarousel/css/owl.theme.default.min.css');

        // Requirements for JS
        Requirements::javascript('widget_sidebar-images/owlcarousel/js/owl.carousel.min.js');
        Requirements::javascript('widget_sidebar-images/owlcarousel/js/owl.slider.setting.js');

    }


}

