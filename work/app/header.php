<header>
    <h1>みんなのしおり</h1>
    <nav>
        <p onclick="toSearch()">検索</p>
        <p onclick="toPostForm()">投稿</a></p>
        <p onclick="toHome()">しおり一覧</p>
    </nav>
    <script>
        const toSearch = () => {
            location.href = "/work/public/search_form.php";
        }
        const toPostForm = () => {
            location.href = "/work/public/postForm.php";
        }
        const toHome = () => {
            location.href = "/";
        }
    </script>
</header>