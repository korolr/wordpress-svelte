<script>
  import { onMount } from "svelte";

  import { Link } from "svero";

  let posts = [];

  onMount(async () => {
    const res = await fetch(process.env.SITE + "/wp-json/wp/v2/posts");
    posts = await res.json();
  });
</script>

{#each posts as post}
  <Link href="/page/ + {post.id}" className="btn">
    <h1>{post.title.rendered}</h1>
  </Link>

  <p>{new Date(post.date).toDateString()}</p>
  <p>
    {@html post.content.rendered}
  </p>
{:else}
  <p>loading...</p>
{/each}
