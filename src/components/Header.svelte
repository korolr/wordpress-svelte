<script>
  import { Link } from "svero";

  export let info = {};
</script>

<style>
  h1 {
    color: inherit;
  }
</style>

{#if info.name !== undefined}
  <Link href="/">
    <h1 class="nes-text is-success">{info.name}</h1>
  </Link>

  <h1 class="nes-text">{info.description}</h1>
{/if}
