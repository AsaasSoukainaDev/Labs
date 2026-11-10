---
name: marp-template
description: Creates French Marp lab presentations from a reusable template with OFPPT and Solicode logos and a navy, teal, orange, and light-neutral visual identity. Use when creating a Marp deck, cover page, or branded presentation template for this workspace.
---

# Marp Template

## Role

Create or adapt Marp lab presentations using the reusable template, supplied logos, and visual identity in this skill. Keep content accurate to the lab sources and preserve any stronger project-specific design requirements.

## When to use

- Use for requests to create a Marp lab presentation, cover page, branded slide deck, or presentation template in this workspace.
- Use alongside the `marp` skill for Marp structure, factual content, and slide readability.
- Do not impose OFPPT or Solicode branding on an unrelated project unless requested.

## Resources

- Start from [`assets/presentation-template.md`](assets/presentation-template.md).
- The supplied logos are in `assets/images/ofppt_logo.png` and `assets/images/logo_solicode.png`.
- When copying the template to a project, copy both logo files into an `images/` folder beside the destination Markdown file. Keep the filenames unchanged so the image references resolve.

## Visual identity

- Use navy `#172033` for title slides and code blocks.
- Use teal `#0F766E` for headings and primary emphasis, with turquoise `#14B8A6` as a rule or secondary accent.
- Use orange `#F97316` sparingly for problem or attention headings.
- Use `#F8FAFC` for light slides and `#D1D5DB` for secondary text on dark slides.
- Use a restrained sans-serif font such as `Segoe UI`, clear contrast, and a 16:9 canvas.
- Place the OFPPT round logo and Solicode wordmark side by side on the title slide. Preserve their aspect ratios; crop the Solicode image only to remove its unused square margins.
- Alternate dark and light slides where appropriate. Keep text concise and avoid overcrowding.

## Workflow

1. Inspect the lab README, its existing presentation, the applicable project instructions, and any supplied logos or brand rules.
2. Use the included template as a starting point. Preserve the lab's existing title or slug and replace placeholders only with sourced information.
3. Copy the logo files beside the presentation into `images/`, unless the project already has equivalent local assets. Use relative image paths; do not reference files outside the project in the final deck.
4. Adapt the generic sections to the README and lab: title, plan, stack, definitions, problem, solution, and practical demonstration. Follow the content rules in the `marp` skill; never invent a student's personal problem or solution.
5. Keep the logos and colors consistent across slides. Do not add a conclusion or thanks slide unless requested.
6. Validate the Marp frontmatter and local image paths, then export the deck when the Marp exporter is available. Inspect the cover and at least one content slide for logo rendering, contrast, and overflow.

## Completion checklist

- The deck uses valid Marp frontmatter and the requested 16:9 layout.
- Both logos resolve from local relative paths and render on the cover.
- The color palette and typography follow the visual identity unless project-specific rules take precedence.
- Placeholders, personal details, problem statements, and results are not presented as facts without source material.
- Export or validation status is reported accurately; mention checks that could not be run.