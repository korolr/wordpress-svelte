<script>
  import { onMount } from "svelte";
  import { Link } from "svero";

  import { category } from "../stores/category/store";
  import { author } from "../stores/author/store";

  let posts = [];

  onMount(async () => {
    const res = await fetch(process.env.SITE + "/wp-json/wp/v2/posts");
    posts = await res.json();
  });
</script>

{#each $category as cat}
  <h2>{cat.name}</h2>
{:else}
  <p>loading...</p>
{/each}

{#each posts as post}
  <Link href="/{post.id}" className="btn">
    <h1>{post.title.rendered}</h1>
  </Link>

  {#each $author as auth}
    {#if post.author === auth.id}
      <h3>{auth.name}</h3>
    {/if}
  {/each}

  {#each post.categories as id_cat}
    {#each $category as cat}
      {#if id_cat === cat.id}
        <h3>{cat.name}</h3>
      {/if}
    {/each}
  {/each}

  <p>{new Date(post.date).toDateString()}</p>
  <p>
    {@html post.content.rendered}
  </p>
{:else}
  <p>loading...</p>
{/each}
