# Presentation Folder Rules

When adding a new presentation to this workspace:

- Give the presentation its own folder directly inside the workspace root.
- Put its entry page at `<folder-name>/index.html`.
- Add a link or button to the root `index.html` inside the `Presentations` navigation.
- Use the folder name as the visible link label and link to `./<folder-name>/index.html`.
- Update the presentation count in the root page header whenever the number of presentations changes.
- When renaming or removing a presentation folder, update its root link and the count in the same change.
- Before finishing, verify that every presentation link points to an existing `index.html` and that the displayed count matches the links.
