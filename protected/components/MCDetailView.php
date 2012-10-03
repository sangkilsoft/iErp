<?php

/**
 * Description of MCDetailView
 * New look for CDetailView
 * @author mujib
 */
require_once(YII_PATH . '/zii/widgets/CDetailView.php');

class MCDetailView extends CDetailView {

    /**
     * Renders the detail view.
     * This is the main entry of the whole detail view rendering.
     */
    //@overide by mujib
    public function run() {
        $formatter = $this->getFormatter();

        echo '<div class="grid-view">';
        echo CHtml::openTag($this->tagName, $this->htmlOptions);
        echo '<tbody>';
        $i = 0;
        $n = is_array($this->itemCssClass) ? count($this->itemCssClass) : 0;

        foreach ($this->attributes as $attribute) {
            if (is_string($attribute)) {
                if (!preg_match('/^([\w\.]+)(:(\w*))?(:(.*))?$/', $attribute, $matches))
                    throw new CException(Yii::t('zii', 'The attribute must be specified in the format of "Name:Type:Label", where "Type" and "Label" are optional.'));
                $attribute = array(
                    'name' => $matches[1],
                    'type' => isset($matches[3]) ? $matches[3] : 'text',
                );
                if (isset($matches[5]))
                    $attribute['label'] = $matches[5];
            }

            if (isset($attribute['visible']) && !$attribute['visible'])
                continue;

            $tr = array('{label}' => '', '{class}' => $n ? $this->itemCssClass[$i % $n] : '');
            if (isset($attribute['cssClass']))
                $tr['{class}'] = $attribute['cssClass'] . ' ' . ($n ? $tr['{class}'] : '');

            if (isset($attribute['label']))
                $tr['{label}'] = $attribute['label'];
            else if (isset($attribute['name'])) {
                if ($this->data instanceof CModel)
                    $tr['{label}'] = $this->data->getAttributeLabel($attribute['name']);
                else
                    $tr['{label}'] = ucwords(trim(strtolower(str_replace(array('-', '_', '.'), ' ', preg_replace('/(?<![A-Z])[A-Z]/', ' \0', $attribute['name'])))));
            }

            if (!isset($attribute['type']))
                $attribute['type'] = 'text';
            if (isset($attribute['value']))
                $value = $attribute['value'];
            else if (isset($attribute['name']))
                $value = CHtml::value($this->data, $attribute['name']);
            else
                $value = null;

            $tr['{value}'] = $value === null ? $this->nullDisplay : $formatter->format($value, $attribute['type']);

            echo strtr(isset($attribute['template']) ? $attribute['template'] : $this->itemTemplate, $tr);

            $i++;
        }
        echo '</tbody>';
        echo CHtml::closeTag($this->tagName);
        echo '</div>';
    }

}

?>
