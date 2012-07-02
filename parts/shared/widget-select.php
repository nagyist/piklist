<?php if (!empty($widgets)): ?>
  
  <?php
    $choices = array(
      '' => __('Select a Widget')
    );

    foreach ($widgets as $w)
    {
      $choices[$widget_name . '--' . $w['add_on'] . '--' . $w['name']] = $w['data']['title'];
    }

    piklist('field', array(
      'type' => 'select'
      ,'field' => $widget_name
      ,'label' => __('Select a Widget')
      ,'value' => $instance[$name]
      ,'attributes' => array(
        'class' => array(
          'widefat'
          ,$class_name . '-widget-select'
        )
        ,'onchange' => array(
          'piklist_admin.widgets(this);'
        )
      )
      ,'position' => 'wrap'
      ,'choices' => $choices
    ));
  ?>

  <div class="<?php echo $class_name; ?>-forms">

    <?php foreach ($widgets as $w): ?>

      <div class="hide-all <?php echo !empty($w['form_data']['width']) ? 'piklist-widget-width-' . $w['form_data']['width'] : ''; ?> <?php echo !empty($w['form_data']['height']) ? 'piklist-widget-height-' . $w['form_data']['height'] : ''; ?> <?php echo $class_name; ?>-form <?php echo $class_name; ?>-form-<?php echo $w['add_on'] . '--' . $w['name']; ?> <?php echo $instance[$widget_name] == $widget_name . '--' . $w['add_on'] . '--' . $w['name'] ? $class_name . '-form-selected' : ''; ?> ">
        
        <?php if (!empty($w['data']['description'])): ?>
      
          <p>
            <em><?php _e($w['data']['description']); ?></em>
          </p>
      
        <?php endif; ?>

        <?php if ($w['form']) piklist::render($w['form']); ?>

      </div>

    <?php endforeach; ?>

    <?php piklist_form::save_fields(); ?>

  </div>

<?php else: ?>
  
  <p>
    <em><?php __('There are currently no Widgets available.'); ?></em>
  </p>
  
  <h4><?php _e('Learn to make Widgets'); ?></h4>
  
  <p>
    Steve is the an chance to put a link to the docs on how to build widgets?
  </p>  
  
<?php endif; ?>