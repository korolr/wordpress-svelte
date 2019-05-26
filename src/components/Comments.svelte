<script>
  export let comments;
  export let id;
  let form = {
    name: "",
    email: "",
    comment: ""
  };
  let error = "";
  async function handleSubmit() {
    const rawResponse = await fetch(
      process.env.SITE + "/wp-json/wp/v2/comments",
      {
        method: "POST",
        headers: {
          Accept: "application/json",
          "Content-Type": "application/json"
        },
        body: JSON.stringify({
          author_email: form.email,
          author_name: form.name,
          author_url: "",
          content: form.comment,
          post: id
        })
      }
    );

    error = "You comment add to moderation";
  }
</script>

<style>
  .date {
    margin-top: -30px;
  }
</style>

{#if comments.length > 0}
  <h2>{comments.length} comments</h2>

  {#each comments as com}
    <div class="row">
      <div class="column">
        <img src={com.author_avatar_urls[96]} alt="" />
        <p>{com.author_name}</p>
        <p class="date"> {new Date(com.date).toDateString()}</p>
      </div>
      <div class="column column-75 ">
        <p>
          {@html com.content.rendered}
        </p>
      </div>
    </div>
  {/each}
{:else}
  <h2>Not comments</h2>
{/if}

<h2>Write comment</h2>

{#if error !== ''}
  <h2>{error}</h2>
{/if}

<form on:submit|preventDefault={handleSubmit}>
  <input
    bind:value={form.name}
    type="text"
    required
    placeholder="Enter your name" />
  <input
    bind:value={form.email}
    type="email"
    required
    placeholder="Enter your email" />
  <textarea
    bind:value={form.comment}
    type="text"
    required
    placeholder="You text" />
  <button type="submit">Post comment</button>
</form>
