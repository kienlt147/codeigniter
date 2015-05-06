$.fn.categories = {}

$.fn.categories.init = () ->
  $ document
    .on "click", "#add_list", ()->
      $.fn.categories.addListFields()
  $ document
    .on "click", ".remove_fields", ()->
      $ this
        .parent "div"
          .remove()

$.fn.categories.addListFields = ()->
  date = new Date()
  tag = '<div class="form-group"><input type="text_field" class="form-control" placeholder="Nhập tên ..." name="category_list_name[' + date.getTime() + ']" /><a class="btn btn-danger remove_fields" href="javascript:void(0)">Remove</a></div>'
  $ "fieldset"
    .append tag
