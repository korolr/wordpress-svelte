<script>
  import { onMount } from "svelte";
  import { Link } from "svero";

  import { category } from "../stores/category/store";
  import { author } from "../stores/author/store";
  import { info } from "../stores/info/store";
  import ListPost from "../components/ListPost.svelte";

  let posts = [];

  onMount(async () => {
    const res = await fetch(process.env.SITE + "/wp-json/wp/v2/posts");
    posts = await res.json();
    document.title = $info.name;
  });
</script>

<ListPost {posts} {author} {category} />
