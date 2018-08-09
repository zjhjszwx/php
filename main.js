function confirm_delete(id) {
    console.log("id", id)
    if (confirm('确定要删除吗')) {
        $.post('resume_remove.php?id=' + id, null, function (result) {
            document.location.reload(true);
            if (result == 'done') {
                $('#rlist' + id).remove();
            }
        })
    }
}