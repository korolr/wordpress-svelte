<script>
  import { Link } from "svero";

  export let info = {};
</script>

{#if info.name !== undefined}
  <Link href="/">
    <h1>{info.name}</h1>
  </Link>

  <h1>{info.description}</h1>
{/if}
