<script>
  import { Router, Route } from "svero";

  import Blog from "./containers/Blog.svelte";
  import Page from "./containers/Page.svelte";
  import Author from "./containers/Author.svelte";
  import Category from "./containers/Category.svelte";

  import Header from "./components/Header.svelte";
  import Footer from "./components/Footer.svelte";

  import { info } from "./stores/info/store";
</script>

<div class="center-xs">
  <Header info={$info} />
  <Router>
    <Route path="*" component={Blog} />
    <Route path="/:id" component={Page} />
    <Route path="/category/:name" component={Category} />
    <Route path="/author/:name" component={Author} />
  </Router>
</div>

<Footer />
