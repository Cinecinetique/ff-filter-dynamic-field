# Filter Dynamic Field


## code from https://formidablepro.com/knowledgebase/frm_setup_new_fields_vars/

```
Filter Dynamic Field
Use this code to filter the options in a Dynamic field. This example will make it so the option will only appear if there is a field that equals "Yes" in the linked form.

add_filter('frm_setup_new_fields_vars', 'filter_dfe_options', 25, 2);
function filter_dfe_options($values, $field){
    if ( $field->id == 125 && !empty( $values['options'] ) ) {//Replace 125 with the ID of your Dynamic field
        $temp = $values;
        $temp['form_select'] = 30;//change 30 to the id of the field (in linked form) that you want to filter by
        $field2_opts = FrmProDynamicFieldsController::get_independent_options( $temp, $field );
        foreach ( $values['options'] as $id => $v ) {
            if ( isset( $field2_opts[$id] ) && ( $v == '' || $field2_opts[$id] == 'Yes' ) ) {//Only include values where filtering field equals Yes
                continue;
            }
            unset( $values['options'][$id] );
        }
    }
    return $values;
}
```
