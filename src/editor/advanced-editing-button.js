import { useState, createRoot } from "@wordpress/element";
import { Button } from "@wordpress/components";

import { subscribe, useDispatch } from "@wordpress/data";
import { store as noticesStore } from "@wordpress/notices";
import domReady from "@wordpress/dom-ready";
import { __ } from "@wordpress/i18n";
import { lock, unlock } from "@wordpress/icons";

const SUPPORTED_BLOCKS = ["core/group", "core/cover"];

const AdvancedEditingButton = ({ visibility }) => {
	const [contentLock, setContentLock] = useState(true);
	const { createNotice } = useDispatch(noticesStore);

	if (!visibility) {
		return null;
	}

	const parseBlocks = (blocks) => {
		blocks.forEach((block) => {
			if (
				SUPPORTED_BLOCKS.includes(block.name) &&
				block.attributes?.showContentLock
			) {
				block.attributes.templateLock = contentLock ? "" : "contentOnly";
				wp.data.dispatch("core/block-editor").updateBlock(block.clientId, {
					...block,
				});
			}

			if (block.innerBlocks) {
				parseBlocks(block.innerBlocks);
			}
		});
	};

	const toggleContentLock = () => {
		// Get all blocks in the editor
		const blocks = wp.data.select("core/block-editor").getBlocks();
		parseBlocks(blocks);
		createNotice(
			"success",
			__("Advanced Editing") + (contentLock ? " Unlocked" : " Locked"),
			{
				type: "snackbar",
			},
		);
		setContentLock(!contentLock);
	};

	return (
		<>
			<Button
				variant="secondary"
				className="components-button"
				onClick={toggleContentLock}
				icon={contentLock ? lock : unlock}
			>
				{contentLock ? "Switch to Advanced" : "Switch to Basic"}
			</Button>
		</>
	);
};

/**
 * Let's subscribe (because I finally understand what this does better)
 * and add the component to the toolbar!
 */
subscribe(() => {
	const advancededitingbutton = document.querySelector(
		"#wpdev-advanced-editing-button-wrapper",
	);

	// If the Advanced Editing Button already exists, skip render
	if (advancededitingbutton) {
		return;
	}

	domReady(() => {
		const siteEditorToolbar = document.querySelector(".editor-header__toolbar");
		// If toolbar doesn't exist, we can't continue
		if (!siteEditorToolbar) {
			return;
		}
		// So turns out you can't append to an existing container without
		// using dangerouslySetInnerHTML, which..I don't want to use.
		const buttonWrapper = document.createElement("div");
		buttonWrapper.id = "wpdev-advanced-editing-button-wrapper";
		buttonWrapper.style.cssText = "display:flex;";

		// add empty div to the toolbar so we can fill it.
		siteEditorToolbar?.appendChild(buttonWrapper);
		createRoot(buttonWrapper).render(
			<AdvancedEditingButton visibility={true} />,
		);
	});
});
