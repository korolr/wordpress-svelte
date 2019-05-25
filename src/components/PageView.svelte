<script>
  import { Link } from "svero";

  export let post;
  export let category;
  export let author;
</script>

<h1>{post.title.rendered}</h1>

{#each $author as auth}
  {#if post.author === auth.id}
    <Link href="/author/{auth.name}">
      <h3>{auth.name}</h3>
    </Link>
  {/if}
{/each}

{#each post.categories as id_cat}
  {#each $category as cat}
    {#if id_cat === cat.id}
      <Link href="/category/{cat.name}">
        <h2>{cat.name}</h2>
      </Link>
    {/if}
  {/each}
{/each}

<p>{new Date(post.date).toDateString()}</p>
<p>
  {@html post.content.rendered}
</p>
