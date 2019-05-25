<script>
  import { onMount } from "svelte";
  import { Link } from "svero";

  let data = {};
  onMount(async () => {
    const res = await fetch(process.env.SITE + "/wp-json/");
    data = await res.json();
  });
</script>

{#if data.name !== undefined}
  <Link href="/">
    <h1>{data.name}</h1>
  </Link>

  <h1>{data.description}</h1>
{/if}
