<script>
  import { onMount } from "svelte";
  import { Link } from "svero";

  import Comments from "../components/Comments.svelte";
  import { category } from "../stores/category/store";
  import { author } from "../stores/author/store";

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

  function handleSubmit() {
    alert(`answered question`);
  }
</script>

{#if data.title}
  <h1>{data.title.rendered}</h1>

  {#each $author as auth}
    {#if data.author === auth.id}
      <h3>{auth.name}</h3>
    {/if}
  {/each}

  {#each data.categories as id_cat}
    {#each $category as cat}
      {#if id_cat === cat.id}
        <h3>{cat.name}</h3>
      {/if}
    {/each}
  {/each}

  <p>{new Date(data.date).toDateString()}</p>
  <p>
    {@html data.content.rendered}
  </p>
  <Comments {comments} id={router.params.id} />

{/if}
