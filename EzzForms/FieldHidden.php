<?php
namespace EzzForms;

/**
 * Class FieldHidden
 * @package EzzForms
 */
class FieldHidden extends FormField {
    /**
     * @param string $extra
     * @return string
     */
    public function render($extra='') {
        return '<input type="hidden" ' . parent::renderAttributes($extra) . ' value="' . escape($this->fieldValue) . '"/>';
    }
}