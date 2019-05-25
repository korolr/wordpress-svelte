<script>
  import { Link } from "svero";

  export let post;
  export let category;
  export let author;
</script>

<style>
  .row-cen {
    flex-direction: column;
    align-items: center;
  }
  .date {
    margin-left: 10px;
    margin-top: 12px;
  }
  .name {
    font-size: 29px;
  }
  .cat {
    font-size: 18px;
    margin-left: 6px;
  }
  .post {
    font-size: 26px;
  }

  .rev dt {
    font-size: 18px;
    margin-left: 6px;
  }
</style>

<h1 class="row row-cen">{post.title.rendered}</h1>

<div class="row">
  {#each $author as auth}
    {#if post.author === auth.id}
      <div class="column">
        <div class="row">
          <Link href="/author/{auth.name}">
            <p class="name">{auth.name}</p>
          </Link>

          <p class="date">{new Date(post.date).toDateString()}</p>
        </div>
      </div>
    {/if}
  {/each}
  <div class="column">
    <div class="rev">
      {#each post.categories as id_cat}
        {#each $category as cat}
          {#if id_cat === cat.id}
            <Link href="/category/{cat.name}">
              <p class="cat">{cat.name}</p>
            </Link>
          {/if}
        {/each}
      {/each}
    </div>
  </div>
</div>

<p>
  {@html post.content.rendered}
</p>
