# Simple worflow for github page using honkit.

1. Add **.github/worflows/filename.yml or filename.yaml"
```bash
    mkdir .github
    cd .gthhub
    mkdir workflows
```

2. Create yml file then add the YAML configuration for the workflow

Sample configuration for the honkit.
```yaml
    name: Build & Deploy HonKit

    # This will run upon push because of the push tag.
    on: 
    push:
        branches: [ master ]  # or your main branch name
    workflow_dispatch:

    jobs:
    build:
        runs-on: ubuntu-latest

        steps:
        # Checkout repo
        - name: Checkout repository
            uses: actions/checkout@v4

        # Setup Node.js
        - name: Setup Node.js
            uses: actions/setup-node@v4
            with:
            node-version: 25

        # Install dependencies
        - name: Install npm dependencies
            run: npm ci

        # Build HonKit book
        - name: Build book
            run: npm run build

        # Deploy to GitHub Pages
        - name: Deploy to GitHub Pages
            uses: peaceiris/actions-gh-pages@v4
            with:
            github_token: ${{ secrets.GITHUB_TOKEN }}
            publish_dir: ./_book # get the files ./_book then put inside the gh-pages branch
            publish_branch: gh-pages # target branch
```

This worflow can be use in different way like code testing for before merging into main/master branch

# Resources
For additional info for github action
* [Github Actions](https://docs.github.com/en/actions)