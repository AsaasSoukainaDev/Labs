---
marp: true
theme: default
paginate: true
size: 16:9
header: 'Plateforme de Webinaires'

---

<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

section {
	position: relative;
	overflow: hidden;
	color: #555b68;
	font-family: 'Inter', sans-serif;
	background:
		radial-gradient(ellipse at 8% 18%, rgba(178, 211, 255, 0.42), transparent 36%),
		radial-gradient(ellipse at 15% 78%, rgba(190, 220, 255, 0.36), transparent 38%),
		linear-gradient(115deg, #f1f7ff 0%, #ffffff 100%);
}

section::before {
	position: absolute;
	top: 8%;
	left: -11%;
	width: 42%;
	height: 84%;
	background:
		radial-gradient(ellipse at 32% 30%, rgba(145, 190, 255, 0.45), transparent 63%),
		radial-gradient(ellipse at 65% 72%, rgba(173, 214, 255, 0.4), transparent 62%);
	content: '';
	filter: blur(80px);
	pointer-events: none;
}

section > * {
	position: relative;
	z-index: 1;
}

section h1,
section h2,
section h3 {
	color: #343a46;
	font-family: 'Inter', sans-serif;
}

section p,
section li {
	color: #626977;
}

.plan-slide {
	display: flex;
	align-items: center;
}

.plan-layout {
	display: grid;
	width: 92%;
	min-height: 500px;
	grid-template-columns: 0.9fr 1.1fr;
	align-items: stretch;
	gap: 0;
}

.col-left {
	display: flex;
	min-height: 500px;
	flex-direction: column;
	justify-content: flex-start;
	border-right: 1px solid rgba(79, 88, 105, 0.22);
	padding: 22px 20px 0 34px;
}

.col-left h1 {
	margin: 0;
	color: #3d4552;
	font-size: 34px;
	font-weight: 700;
	letter-spacing: 0.08em;
}

.col-right {
	display: flex;
	align-items: center;
	border-right: 1px solid rgba(79, 88, 105, 0.22);
	padding: 0 24px 0 145px;
}

.plan-list {
	display: grid;
	margin: 0;
	padding: 0;
	gap: 17px;
	list-style: none;
}

.plan-list li {
	display: grid;
	grid-template-columns: 42px 1fr;
	align-items: baseline;
	gap: 14px;
	color: #666d79;
	font-size: 19px;
	line-height: 1.3;
}

.plan-number {
	color: #424955;
	font-size: 18px;
	font-weight: 700;
	font-variant-numeric: tabular-nums;
}

.plan-title {
	color: #666d79;
	font-weight: 400;
}

.page-number {
	position: absolute;
	right: 32px;
	bottom: 24px;
	color: #555b68;
	font-size: 14px;
	font-weight: 600;
	font-variant-numeric: tabular-nums;
}

.plan-slide::after {
	content: none;
}

.section-slide {
	display: block;
}

.section-layout {
	display: grid;
	width: 100%;
	min-height: 500px;
	grid-template-columns: 0.78fr 1.22fr;
	align-items: start;
	gap: 52px;
	padding-top: 34px;
}

.section-index {
	display: flex;
	align-items: flex-start;
	border-right: 1px solid rgba(79, 88, 105, 0.22);
	color: #424955;
	font-size: 112px;
	font-weight: 700;
	font-variant-numeric: tabular-nums;
	padding-top: 50px;
}

.section-copy {
	display: flex;
	flex-direction: column;
	justify-content: flex-start;
	padding-right: 24px;
	padding-top: 58px;
}

.section-kicker {
	margin: 0 0 14px;
	color: #777f8e;
	font-size: 14px;
	font-weight: 600;
	letter-spacing: 0.08em;
	text-transform: uppercase;
}

.section-copy h1 {
	margin: 0;
	font-size: 48px;
}

.section-copy p {
	max-width: 540px;
	margin-top: 22px;
	font-size: 21px;
	line-height: 1.5;
}

section.page-numbered::after {
	content: none;
}

.content-example h1 {
	margin-bottom: 28px;
}

.content-example .example-lead {
	max-width: 940px;
	color: #4f5866;
	font-size: 27px;
	line-height: 1.45;
}

.content-example ul {
	margin-top: 26px;
	padding-left: 1.2em;
}

.content-example li {
	margin: 12px 0;
	font-size: 21px;
}

.figure-slide > h1 {
	margin: 0 0 24px;
	font-size: 36px;
}

.figure-placeholder {
	display: flex;
	width: 100%;
	height: min(42vh, 360px);
	min-height: 260px;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	gap: 10px;
	border: 1px dashed rgba(86, 111, 148, 0.55);
	background: rgba(255, 255, 255, 0.68);
	text-align: center;
}

.figure-placeholder p {
	margin: 0;
}

.figure-alert {
	color: #40526d !important;
	font-size: 14px;
	font-weight: 700;
	letter-spacing: 0.08em;
}

.figure-file {
	color: #536986 !important;
	font-family: Consolas, monospace;
	font-size: 18px;
}

.figure-caption {
	color: #717b89 !important;
	font-size: 16px;
}

.figure-grid {
	display: grid;
	grid-template-columns: repeat(3, minmax(0, 1fr));
	gap: 18px;
}

.figure-grid .figure-placeholder {
	height: 250px;
	min-height: 0;
}

@media (max-width: 700px) {
	.plan-layout {
		width: 100%;
		grid-template-columns: 0.8fr 1.2fr;
	}

	.col-left {
		padding-left: 18px;
	}

	.col-right {
		padding-right: 12px;
		padding-left: 24px;
	}

	.col-left h1 {
		font-size: 28px;
	}

	.plan-list {
		gap: 14px;
	}

	.plan-list li {
		grid-template-columns: 34px 1fr;
		gap: 8px;
		font-size: 16px;
	}

	.section-layout {
		grid-template-columns: 0.65fr 1.35fr;
		gap: 28px;
	}

	.section-layout {
		padding-top: 20px;
	}

	.section-index {
		font-size: 80px;
	}

	.section-copy h1 {
		font-size: 36px;
	}

	.figure-grid {
		grid-template-columns: 1fr;
	}

	.figure-grid .figure-placeholder {
		height: 180px;
	}
}
</style>

# Page de garde

<!-- Contenu à rédiger -->
<!-- Notes présentateur -->

---

<!-- _class: plan-slide page-numbered -->
<div class="plan-layout">
	<div class="col-left">
		<h1>SOMMAIRE</h1>
	</div>
	<div class="col-right">
		<ol class="plan-list">
			<li><span class="plan-number">01</span><span class="plan-title">Contexte du projet</span></li>
			<li><span class="plan-number">02</span><span class="plan-title">Méthodologie de travail</span></li>
			<li><span class="plan-number">03</span><span class="plan-title">Branche fonctionnelle</span></li>
			<li><span class="plan-number">04</span><span class="plan-title">Outils utilisés</span></li>
			<li><span class="plan-number">05</span><span class="plan-title">Conception</span></li>
			<li><span class="plan-number">06</span><span class="plan-title">Architecture du projet</span></li>
			<li><span class="plan-number">07</span><span class="plan-title">Réalisation et tests</span></li>
			<li><span class="plan-number">08</span><span class="plan-title">Conclusion</span></li>
		</ol>
	</div>
</div>
<div class="page-number">01</div>

---

<!-- _class: content-example page-numbered -->
# Exemple de contenu

<p class="example-lead">La plateforme de webinaires rassemble les outils nécessaires pour organiser des sessions en ligne et faciliter la participation.</p>

- **Sessions** : présenter des sujets et réunir intervenants et participants.
- **Inscriptions** : simplifier l'accès aux webinaires.
- **Échanges** : accompagner l'interaction pendant les sessions.

<div class="page-number">02</div>

---

<!-- _class: section-slide page-numbered -->
<div class="section-layout">
	<div class="section-index">07</div>
	<div class="section-copy">
		<p class="section-kicker">Plateforme de Webinaires</p>
		<h1>Réalisation et tests</h1>
		<p>Présentation de la mise en œuvre de la plateforme et de la validation de ses principales fonctionnalités.</p>
	</div>
</div>
<div class="page-number">03</div>

---

<!-- 1. Contexte du projet -->
# Introduction générale

## 1. Contexte du projet

<!-- Contenu à rédiger -->
<!-- Notes présentateur -->

---

# Contexte du projet

<!-- Contenu à rédiger -->
<!-- Notes présentateur -->

---

# Défis opérationnels

<!-- Contenu à rédiger -->
<!-- Notes présentateur -->

---

# Objectifs de la solution

<!-- Contenu à rédiger -->
<!-- Notes présentateur -->

---

# Définition du problème

<!-- Contenu à rédiger -->
<!-- Notes présentateur -->

---

<!-- 2. Méthode de travail -->
<!-- _class: figure-slide -->
# Scrum

<div class="figure-placeholder" role="note">
	<p class="figure-alert">IMAGE À INSÉRER</p>
	<p class="figure-file">images/figure1.png</p>
	<p class="figure-caption">Figure 1 — Méthodologie Scrum</p>
</div>
<!-- Notes présentateur -->

---

<!-- _class: figure-slide -->
# Design Thinking

<div class="figure-placeholder" role="note">
	<p class="figure-alert">IMAGE À INSÉRER</p>
	<p class="figure-file">images/figure2.png</p>
	<p class="figure-caption">Figure 2 — Design Thinking</p>
</div>
<!-- Notes présentateur -->

---

<!-- _class: figure-slide -->
# 2TUP

<div class="figure-placeholder" role="note">
	<p class="figure-alert">IMAGE À INSÉRER</p>
	<p class="figure-file">images/figure3.png</p>
	<p class="figure-caption">Figure 3 — Processus 2TUP</p>
</div>
<!-- Notes présentateur -->

---

<!-- 3. Gestion des tâches -->
<!-- _class: figure-slide -->
# Gestion des tâches

<div class="figure-placeholder" role="note">
	<p class="figure-alert">IMAGE À INSÉRER</p>
	<p class="figure-file">images/figure4.png</p>
	<p class="figure-caption">Figure 4 — Diagramme de Gantt</p>
</div>
<!-- Notes présentateur -->

---

<!-- 4. Branche fonctionnelle -->
# Empathie

<!-- Contenu à rédiger -->
<!-- Notes présentateur -->

---

# Profil : le Participant

<!-- Contenu à rédiger -->
<!-- Notes présentateur -->

---

# Profil : l'Intervenant

<!-- Contenu à rédiger -->
<!-- Notes présentateur -->

---

<!-- _class: figure-slide -->
# Synthèse de la vision (scalabilité)

<div class="figure-placeholder" role="note">
	<p class="figure-alert">IMAGE À INSÉRER</p>
	<p class="figure-file">images/figure5.png</p>
	<p class="figure-caption">Figure 5 — Carte d'empathie</p>
</div>
<!-- Notes présentateur -->

---

<!-- 5. Définition du problème -->
# Définition du problème

<!-- Contenu à rédiger -->
<!-- Notes présentateur -->

---

# Idéation

## Structure technique

## Bénéfices business

<!-- Contenu à rédiger -->
<!-- Notes présentateur -->

---

<!-- 6. Architecture des cas d'utilisation (UML) -->
# Les acteurs du système

<!-- Contenu à rédiger -->
<!-- Notes présentateur -->

---

# Détail des cas d'utilisation

<!-- Contenu à rédiger -->
<!-- Notes présentateur -->

---

<!-- _class: figure-slide -->
# Cas d'utilisation global

<div class="figure-placeholder" role="note">
	<p class="figure-alert">IMAGE À INSÉRER</p>
	<p class="figure-file">images/figure6.png</p>
	<p class="figure-caption">Figure 6 — Cas d'utilisation global</p>
</div>
<!-- Notes présentateur -->

---

<!-- 7. Planification agile : sprints et cas d'utilisation -->
# Stratégie de développement

<!-- Contenu à rédiger -->
<!-- Notes présentateur -->

---

<!-- _class: figure-slide -->
# Sprint 1 : fondations et gestion des Sessions et Thèmes

<div class="figure-placeholder" role="note">
	<p class="figure-alert">IMAGE À INSÉRER</p>
	<p class="figure-file">images/figure7.png</p>
	<p class="figure-caption">Figure 7 — Cas d'utilisation du Sprint 1</p>
</div>
<!-- Notes présentateur -->

---

<!-- _class: figure-slide -->
# Sprint 2 : espace Participant et inscriptions aux Sessions en temps réel

<div class="figure-placeholder" role="note">
	<p class="figure-alert">IMAGE À INSÉRER</p>
	<p class="figure-file">images/figure8.png</p>
	<p class="figure-caption">Figure 8 — Cas d'utilisation du Sprint 2</p>
</div>
<!-- Notes présentateur -->

---

<!-- _class: figure-slide -->
# Sprint 3 : assistant IA et opérations de paiement

<div class="figure-placeholder" role="note">
	<p class="figure-alert">IMAGE À INSÉRER</p>
	<p class="figure-file">images/figure9.png</p>
	<p class="figure-caption">Figure 9 — Cas d'utilisation du Sprint 3</p>
</div>
<!-- Notes présentateur -->

---

<!-- 8. Branche technique et diagramme de classe -->
# Besoins techniques

<!-- Contenu à rédiger -->
<!-- Notes présentateur -->

---

# Analyse technique

<!-- Contenu à rédiger -->
<!-- Notes présentateur -->

---

# Conception générale

<!-- Contenu à rédiger -->
<!-- Notes présentateur -->

---

<!-- _class: figure-slide -->
# Architecture logicielle

<div class="figure-grid">
	<div class="figure-placeholder" role="note">
		<p class="figure-alert">IMAGE À INSÉRER</p>
		<p class="figure-file">images/figure10.png</p>
		<p class="figure-caption">Figure 10 — MVC</p>
	</div>
	<div class="figure-placeholder" role="note">
		<p class="figure-alert">IMAGE À INSÉRER</p>
		<p class="figure-file">images/figure11.png</p>
		<p class="figure-caption">Figure 11 — Architecture N-tiers</p>
	</div>
	<div class="figure-placeholder" role="note">
		<p class="figure-alert">IMAGE À INSÉRER</p>
		<p class="figure-file">images/figure12.png</p>
		<p class="figure-caption">Figure 12 — Architecture globale</p>
	</div>
</div>
<!-- Notes présentateur -->

---

<!-- 9. Conception -->
<!-- _class: figure-slide -->
# Diagramme de classe

<div class="figure-placeholder" role="note">
	<p class="figure-alert">IMAGE À INSÉRER</p>
	<p class="figure-file">images/figure13.png</p>
	<p class="figure-caption">Figure 13 — Diagramme de classe</p>
</div>
<!-- Notes présentateur -->

---

<!-- 10. Maquettes (UI/UX) -->
<!-- _class: figure-slide -->
# Maquettes (UI/UX)

<div class="figure-placeholder" role="note">
	<p class="figure-alert">IMAGE À INSÉRER</p>
	<p class="figure-file">images/figure14.png</p>
	<p class="figure-caption">Figure 14 — Maquettes (UI/UX)</p>
</div>
<!-- Notes présentateur -->

---

<!-- 11. Réalisation et développement -->
# Outils de développement

<!-- Contenu à rédiger -->
<!-- Notes présentateur -->

---

# Technologies utilisées

<!-- Contenu à rédiger -->
<!-- Notes présentateur -->

---

# Bilan d'implémentation des sprints

<!-- Contenu à rédiger -->
<!-- Notes présentateur -->

---

# Conclusion

<!-- Contenu à rédiger -->
<!-- Notes présentateur -->

---

# Merci pour votre attention

<!-- Contenu à rédiger -->
<!-- Notes présentateur -->
