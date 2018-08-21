<?php require 'header.php'; ?>
<div style="width:100%;background:#f1f5f6;height:100px;">

</div>
<iframe src="https://bonjourcapsule.youcanbook.me/?noframe=true&skipHeaderFooter=true" id="ycbmiframebonjourcapsule" style="width:100%;height:1000px;border:0px;background:#f1f5f6;" frameborder="0" allowtransparency="true"></iframe>
<script>
    window.addEventListener && window.addEventListener("message", function(event){
        if (event.origin === "https://bonjourcapsule.youcanbook.me")
        {
            document.getElementById("ycbmiframebonjourcapsule").style.height = event.data + "px";
        }
    }, false);
</script>
<?php require 'footer.php'; ?>
