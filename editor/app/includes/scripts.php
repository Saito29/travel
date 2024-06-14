<!--Bootsrap 5 Js-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!--================= JQuery Min js =================-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<!--DataTables-->
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>    
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>
<script src="<?php echo BASE_EDITOR.'/asset/js/dataTable.js'?>"></script>

<!--Tinymce Editor in Webcomponents if using cloud form-->
<script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-webcomponent@1/dist/tinymce-webcomponent.min.js"></script>

<!--============== Customized JS ======================-->
<script src="<?php echo BASE_ADMIN.'/asset/js/script.js'?>"></script>

<!--Pannellum scripts-->
<script>
    document.getElementById('form').addEventListener('submit', function(e) {
        e.preventDefault();
    
        var form = document.form;
        var url = 'https:\/\/cdn.pannellum.org/2.5/pannellum.htm' +
            '#panorama=' + escape(form.pano_url.value);
        if (form.pano_url.value.slice(0, 7) == 'http://')
            url = 'http' + url.slice(5)
        if(form.pano_title.value != '')
            url += '&title=' + escape(form.pano_title.value);
        if(form.pano_author.value != '')
            url += '&author=' + escape(form.pano_author.value);
        if(form.autoload.checked)
            url += '&autoLoad=true';
            document.getElementById('url').value = url;

        var embedCode0 = '<iframe width="',
            embedCode1 = '" height="400" allowfullscreen style="border-style:none; sandbox="allow-scripts"',
            embedCode2 = '" src="' + url,
            embedCode3 = '"></iframe>';
            document.getElementById('embed-code').value = embedCode0 + '600' +
            embedCode1 + embedCode2 + embedCode3;
        if (form.pano_url.value.slice(0, 7) == 'http://') {
            document.getElementById('result').innerHTML = '<a href="' + url + '">' + url + '</a>';
        } else {
            document.getElementById('result').innerHTML = embedCode0 + '100%' +
            embedCode1 + 'display:block;' + embedCode2 + '&autoLoad=true' + '&amp;autoRotate=-2' + '&amp;pitch=2.3&amp;yaw=-135.4&amp;hfov=120' + embedCode3;
        }
    });
    
    let copy = document.querySelectorAll('#copyable');
    let success = document.getElementById('success');
    let success_msg = document.getElementById('success-msg');

    function btn(){
        copy.select();
        copy.setSelectionRange(0, 99999);
        document.execCommand('copy');
        success.style.display = 'block';
        success_msg.style.display = 'block';
    }

    function copyToClipboard(e) {
        var target = document.getElementById(e.target.dataset.target),
            range = document.createRange();
        target.select();
        if (document.execCommand('copy')) {
            e.target.tooltip.tooltip.innerHTML = e.target.tooltip.tooltip.innerHTML.replace('Copy to Clipboard', 'Copied!');
            e.target.tooltip.styleTooltip();
            e.target.tooltip.updateTooltip()
        }
    }
    var copyBtns = document.getElementsByClassName('copy-btn');
    if (document.queryCommandSupported('copy')) {
        for (var i = 0; i < copyBtns.length; i++) {
            copyBtns[i].disabled = false;
            copyBtns[i].tooltip = new Tooltip(copyBtns[i]);
            copyBtns[i].addEventListener('click', copyToClipboard);
        }
    }
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>