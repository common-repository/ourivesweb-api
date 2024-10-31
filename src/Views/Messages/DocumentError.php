<script>
    function goBack() {
        window.history.go(-1);
    }
</script>
<body>
<div id="notfound">
    <div class="notfound">
        <div class="notfound-404">
            <h1>Oops!</h1>
            <h2><?php $message ?></h2>
        </div>
        <a onclick="goBack()">Go back</a>
    </div>
</div>

<body>