<script>
  import { onMount } from "svelte";
  import { Link } from "svero";

  import { category } from "../stores/category/store";
  import { author } from "../stores/author/store";
  import { info } from "../stores/info/store";
  import ListPost from "../components/ListPost.svelte";

  export let router = {};

  let posts = [];

  onMount(async () => {
    let id;

    await Promise.all(
      $author.map(data => {
        if (data.name === router.params.name) {
          id = data.id;
          return Promise.resolve("ok");
        }
      })
    );
    const res = await fetch(
      process.env.SITE + "/wp-json/wp/v2/posts?author=" + id
    );
    posts = await res.json();
    document.title = $info.name;
  });
</script>

<ListPost {posts} {author} {category} />
