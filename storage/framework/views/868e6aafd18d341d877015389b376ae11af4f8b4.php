<center>
<div id="adobe-dc-view" style="height: 900px; width: 800px;"></div>
</center>
    <script src="https://documentcloud.adobe.com/view-sdk/main.js"></script>
    <script type="text/javascript">
    document.addEventListener("adobe_dc_view_sdk.ready", function(){
    var adobeDCView = new AdobeDC.View({clientId: "aa4bebec28d84934975cfdb99e4b3036", divId: "adobe-dc-view"});
    adobeDCView.previewFile({
      content:{ location:
        { url: "docs/Buku Panduan Aplikasi Perpustakaan.pdf"}},
      metaData:{fileName: "User Guide.pdf"}
    }, {});
  });
</script>

<script type="text/javascript">
    window.print();
</script><?php /**PATH C:\xampp\htdocs\new-perpus1\resources\views/userguide.blade.php ENDPATH**/ ?>