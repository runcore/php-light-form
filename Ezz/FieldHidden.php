<?php
namespace Ezz;

/**
 * Class FieldHidden
 * @package Ezz
 */
class FieldHidden extends FormField {

    protected $isHiddenField = true;

    /**
     * @param string $extra
     * @return string
     */
    public function render($extra='') {
        return '<input type="hidden" ' . parent::renderAttributes($extra) . ' value="' . escape($this->fieldValue) . '"/>';
    }
}
