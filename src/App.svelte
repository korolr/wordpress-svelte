<script>
  import { Router, Route } from "svero";

  import Blog from "./components/Blog.svelte";
  import Page from "./components/Page.svelte";
</script>

<div class="center-xs">
  <Router>
    <Route path="*" component={Blog} />
    <Route path="/page/:id" component={Page} />
  </Router>
</div>
