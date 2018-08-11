function addImage() {
    html = '<tr id="image-row' + image_row + '">';
    html += '  <td class="text-left"><a href="" id="thumb-image' + image_row + '"data-toggle="image" class="img-thumbnail"><img width="100" src="https://imageog.flaticon.com/icons/png/512/3/3901.png?size=1200x630f&pad=10,10,10,10&ext=png" alt="" title="" data-placeholder="http://phamloi7710.myzozo.net/image/cache/no_image-100x100.png" /></a><input type="hidden" name="product_image[' + image_row + '][image]" value="" id="input-image' + image_row + '"></td>';
    html += '  <td class="text-right"><input type="text" name="product_image[' + image_row + '][sort_order]" value="" placeholder="Thứ tự" class="form-control" /></td>';
    html += '  <td class="text-left"><button type="button" onclick="$(\'#image-row' + image_row + '\').remove();" data-toggle="tooltip" title="Xóa" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';

    $('#images tbody').append(html);

    image_row++;
}




<tr id="image-row' + image_row + '">
    <td class="text-left">
        <a href="" id="thumb-image' + image_row + '"data-toggle="image" class="img-thumbnail">
            <img width="100" src="https://imageog.flaticon.com/icons/png/512/3/3901.png?size=1200x630f&pad=10,10,10,10&ext=png" alt="" title="" data-placeholder="http://phamloi7710.myzozo.net/image/cache/no_image-100x100.png">
        </a>
        <input type="hidden" name="product_image[' + image_row + '][image]" value="" id="input-image' + image_row + '">
    </td>
    <td class="text-right">
        <input type="text" name="product_image[' + image_row + '][sort_order]" value="" placeholder="Thứ tự" class="form-control" />
    </td>
    <td class="text-left">
        <button type="button" onclick="$(\'#image-row' + image_row + '\').remove();" data-toggle="tooltip" title="Xóa" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
    </td>';
    html += '</tr>
</tr>