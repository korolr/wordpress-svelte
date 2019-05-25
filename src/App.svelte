<script>
  import { Router, Route } from "svero";

  import Blog from "./containers/Blog.svelte";
  import Page from "./containers/Page.svelte";
  import Header from "./components/Header.svelte";
  import Footer from "./components/Footer.svelte";
</script>

<div class="center-xs">
  <Header />
  <Router>
    <Route path="*" component={Blog} />
    <Route path="/:id" component={Page} />
  </Router>
</div>

<Footer />
