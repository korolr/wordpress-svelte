<script>
  import { onMount } from "svelte";
  import { Link } from "svero";

  import Comments from "../components/Comments.svelte";
  import { category } from "../stores/category/store";
  import { author } from "../stores/author/store";
  import PageView from "../components/PageView.svelte";

  export let router = {};

  let data = {};
  let comments = [];
  onMount(async () => {
    const resData = await fetch(
      process.env.SITE + "/wp-json/wp/v2/posts/" + router.params.id
    );
    data = await resData.json();
    const resComments = await fetch(
      process.env.SITE + "/wp-json/wp/v2/comments?post" + router.params.id
    );

    comments = await resComments.json();
    document.title = data.title.rendered;
  });
</script>

{#if data.title}
  <PageView post={data} {author} {category} />
  <Comments {comments} id={router.params.id} />
{/if}
