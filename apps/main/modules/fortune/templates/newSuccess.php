<?php echo form_tag_for($form, 'fortune') ?>
  <?php $form->renderHiddenFields() ?>
  <?php $form->renderGlobalErrors() ?>
  <table>
    <?php echo $form ?>
    <tr>
      <td></td>
      <td><input type="submit" value="Add fortune"/>
    </tr>
  </table>
</form>