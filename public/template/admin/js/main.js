$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


function removeRow(id,url)
{
    if(confirm('Xóa mà không thể khôi phục. Bạn có chắc ?'))
    {
        $.ajax({
            type:'DELETE',
            datatype: 'JSON',
            data: {id},
            url: url,
            success: function (result){
               if(result.error === false){
                   alert(result.message);
                   location.reload();
               }
               else{
                   alert('Xóa lỗi vui lòng thử lại !');
               }
            }
        })
    }
}

/*Upload File*/
$('#upload').change(function () {
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/admin/upload/services',
        success: function (results) {
            if (results.success) {
                console.log('File uploaded successfully:', results.path);
                // Có thể hiển thị hình ảnh vừa upload
                $('#image-preview').attr('src', results.path);
            } else {
                console.error('Upload failed:', results.message);
            }
        },
        error: function (xhr, status, error) {
            console.error('An error occurred:', error);
        }
    });
});

