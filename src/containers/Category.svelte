<script>
  import { onMount } from "svelte";
  import { Link } from "svero";

  import { category } from "../stores/category/store";
  import { author } from "../stores/author/store";
  import { info } from "../stores/info/store";
  import ListPost from "../components/ListPost.svelte";

  export let router = {};

  let posts = [];

  function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
  }
  onMount(async () => {
    let id;
    await sleep(300);
    await Promise.all(
      $category.map(data => {
        if (data.name === router.params.name) {
          id = data.id;
          return Promise.resolve("ok");
        }
      })
    );
    const res = await fetch(
      process.env.SITE + "/wp-json/wp/v2/posts?categories=" + id
    );
    posts = await res.json();
    document.title = router.params.name;
  });
</script>

<ListPost {posts} {author} {category} />
