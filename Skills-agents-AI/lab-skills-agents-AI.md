---
name: create-labs
description: "Create or expand a learning lab, workshop, or technical presentation in this repository. Use when writing lab materials or formatting a lab deliverable as a standardized Marp slide deck."
argument-hint: "Topic and any audience, language, or format preferences"
---

# Create Labs

## Overview

Create or expand a complete, teachable lab that fits this repository and can be opened from its presentation directory. Keep the material accurate, accessible, and consistent with existing labs.

When the requested deliverable is a slide deck, create a Marp presentation with a consistent visual style and the required five-part opening architecture. Keep the editable slide content in one `lab-<topic>.md` file.

## When to Use

Use this skill when:

- Creating a new learning lab, workshop, technical presentation, or teaching resource in this repository.
- Expanding or adapting an existing lab while preserving repository conventions.
- Turning a completed lab, technical assignment, code examples, debugging notes, or implementation into a Marp slide deck.
- Standardizing slide presentations across technical modules.

Do not use this skill for unrelated application features or edits to existing lab content that do not involve creating or expanding a learning resource.

## Mandatory Lab Structure

Every new lab must:

- Live in its own clearly named, root-level folder.
- Include an `index.html` browser entry point that describes the lab and links back to the root presentation directory.
- Keep its editable source material alongside the entry page.
- Be discoverable from the root `index.html` presentation list.

For slide decks, use an editable Marp source named `lab-<topic>.md` in the lab folder, and make the folder's `index.html` the browser entry point for the presentation. Keep all slide content, examples, exercises, diagrams, and explanations in that single Marp file; do not create companion Markdown or exercise files. For concise reference-style labs that are not slide decks, follow the closest existing source format. Do not replace or overwrite an existing lab unless asked.

## Mandatory Slide Architecture

Every Marp presentation must start with `marp: true` and use this sequence for its first five slides:

1. **Title:** The lab name or topic only. Do not put an author or presenter name, student ID, organization, date, or decorative subtitle on this slide unless explicitly requested.
2. **Lab Plan:** Use this exact agenda:

   ```markdown
   <!-- _class: light -->

   ## Lab Plan

   1. Introduction
   2. Problems Encountered
   3. Solutions Implemented
   ```

3. **Introduction:** Briefly explain the lab's purpose, scope, and objectives; list its key technologies, concepts, tools, or syntax.
4. **Problems Encountered:** Describe real challenges, errors, syntax pitfalls, or configuration issues. If there were none, state: *"No blocking technical problems encountered during implementation."*
5. **Solutions Implemented:** Explain the concrete fixes and engineering practices applied to the problems in the previous slide.

After the opening five slides, include practical implementation examples, exercises, diagrams, and explanations directly in the deck. Use complete, runnable code when appropriate and declare the language on every code fence. Include a concise summary and verification matrix when it fits the deliverable; report only validation that actually occurred.

## Design & Formatting Standards

1. **Frontmatter:** Start every Marp source with the following configuration:

   ```yaml
   ---
   marp: true
   theme: default
   paginate: true
   size: 16:9
   style: |
     section {
       background-color: #0f172a;
       color: #f8fafc;
       font-family: 'Inter', system-ui, sans-serif;
       padding: 40px 60px;
     }
     h1, h2, h3 {
       font-family: 'Inter', system-ui, sans-serif;
       font-weight: 600;
       letter-spacing: -0.02em;
     }
     h1 {
       color: #38bdf8;
       font-size: 1.8em;
     }
     h2 {
       color: #38bdf8;
       font-size: 1.3em;
     }
     h3 {
       color: #7dd3fc;
       font-size: 1.05em;
     }
     section.light {
       background-color: #f8fafc;
       color: #0f172a;
     }
     section.light h1, section.light h2, section.light h3 {
       color: #0284c7;
     }
     pre, code {
       background-color: #1e293b;
       color: #e2e8f0;
       border-radius: 6px;
       font-family: 'Fira Code', 'Consolas', monospace;
     }
     section.light pre, section.light code {
       background-color: #e2e8f0;
       color: #0f172a;
     }
     table {
       width: 100%;
       border-collapse: collapse;
       font-size: 0.78em;
       line-height: 1.35;
     }
     th {
       background-color: #1e293b;
       color: #f8fafc;
       font-weight: 600;
       padding: 8px 10px;
       text-align: left;
       vertical-align: top;
     }
     td {
       background-color: #172033;
       color: #f8fafc;
       padding: 8px 10px;
       border-bottom: 1px solid #475569;
       vertical-align: top;
     }
     section.light th {
       background-color: #e0f2fe;
       color: #0f172a;
     }
     section.light td {
       background-color: #ffffff;
       color: #0f172a;
     }
     section.light tbody tr:nth-child(even) td {
       background-color: #f1f5f9;
     }
     section.light td {
       border-bottom: 1px solid #cbd5e1;
     }
   ---
   ```

2. **Slide delimiters:** Separate every slide with `---` on its own line.
3. **Visual rhythm:** Alternate dark slides (the default) and light slides using `<!-- _class: light -->` immediately after the slide delimiter.
4. **Code:** Specify a language on every fenced code block, such as `html`, `javascript`, `bash`, `php`, `json`, or `sql`; never use an untagged code fence.
5. **Tables:** Use explicit Markdown column alignment markers, for example `:---`, `:---:`, and `---:`.
6. **Language and accuracy:** Write in the requested language. Do not invent problems, fixes, test results, or validation evidence.

## Slide Deck Template

After the required frontmatter above, follow this outline. Replace bracketed guidance with content grounded in the actual lab:

````markdown
# [Lab Name Only]

---
<!-- _class: light -->

## Lab Plan

1. Introduction
2. Problems Encountered
3. Solutions Implemented

---

## 1. Introduction

- **Purpose & Scope:** [Lab objectives and technical scope]
- **Technologies & Key Concepts:** [Tools, concepts, and syntax]

---
<!-- _class: light -->

## 2. Problems Encountered

- [Describe actual issues, or state that no blocking problems were encountered.]

---

## 3. Solutions Implemented

- [Describe the concrete fixes and practices used.]

---
<!-- _class: light -->

## Practical Implementation: [Exercise Name]

```javascript
// Include a complete, relevant example when appropriate.
```

---

<!-- _class: light -->

## Summary & Verification Matrix

| Objective | Status | Evidence |
|:---|:---:|:---|
| [Objective] | [Actual status] | [Observed evidence] |
````

## Content & Repository Standards

1. **Fit the audience and goal.** Identify the topic, audience, language, learning goals, and requested format. Use sensible defaults from nearby labs; ask a focused question only if an essential choice would otherwise be a significant guess.
2. **Teach clearly.** Explain concepts in original, accessible language. Include relevant examples, a practical activity or reflection, and a concise recap. Keep the scope coherent and avoid unsupported claims.
3. **Follow local conventions.** Match the root `index.html` presentation-list markup. Use the exact folder name as the link text and `./<folder-name>/index.html` as the relative URL.
4. **Use reliable sources.** Verify factual claims against reliable sources when research tools are available, and include useful source links in the material.
5. **Preserve the repository.** Inspect the working tree before editing and preserve unrelated user changes. Keep changes focused on the requested lab.
6. **Follow nearby examples.** Use `Marp/marp.md` for Marp conventions and `MVC/presentation-mvc.md` for slide content with speaker notes, while keeping the required five-slide architecture for new Marp decks.

## Workflow

1. Read the root `index.html` and the closest existing lab sources and entry page.
2. Choose a clear, consistent folder name and a format suited to the lab. For a slide deck, create one `lab-<topic>.md` source inside the lab folder.
3. Develop the material for the intended audience. For a Marp deck, follow the mandatory opening slide sequence, then add practical examples and a concise evidence-based recap.
4. Verify factual claims against reliable sources when research tools are available.
5. Add the editable source and folder-local `index.html`. Make the entry page descriptive, accessible, and navigable back to the root presentation directory. For Marp, ensure the browser entry presents the deck and is current with the source when project tooling is available.
6. Add a link to the root `index.html` presentation list using the exact folder name and relative URL.
7. Check that links and relative paths resolve, the root entry follows the rule, the source and entry page agree, the first five Marp slides follow the required sequence, and any generated deck is current. Run focused validation when the format or project tooling provides one.

## Output & Verification

Deliver a complete lab folder and matching root presentation-list entry. For a Marp deck, include the single editable `lab-<topic>.md` source and a matching browser entry point. Report the files created or updated, summarize the lab, and state which validations ran or could not be performed.

## Red Flags & Anti-Patterns

| Avoid | Why | Required approach |
|:---|:---|:---|
| Adding names, IDs, dates, or subtitles to the title slide without being asked | The required opening slide is only the lab title. | Keep slide 1 to the lab name or topic. |
| Reordering or changing the first five Marp slides | It breaks the consistent presentation architecture. | Keep Title > Lab Plan > Introduction > Problems Encountered > Solutions Implemented. |
| Inventing technical incidents or claiming unrun tests passed | It makes the presentation misleading. | Describe real issues and fixes; state when no blocking problems occurred and report only actual validation. |
| Omitting language tags on code blocks or alignments on tables | Examples become harder to read and inconsistent. | Tag every code fence and explicitly align Markdown table columns. |
| Splitting a Marp deck into companion Markdown or exercise files | The deck content becomes scattered. | Keep all slide content and exercises in the single `lab-<topic>.md` source. |
| Creating a lab without a folder-local `index.html` or root listing entry | The lab is not consistently accessible or discoverable. | Match the root presentation-list conventions and keep the list in sync. |
| Overwriting an existing lab without permission | Existing learning material may be lost. | Create a new folder or edit an existing lab only when requested. |
| Leaving links, generated decks, or source files out of sync | The delivered lab may be incomplete or misleading. | Verify paths and source-to-entry consistency before finishing. |