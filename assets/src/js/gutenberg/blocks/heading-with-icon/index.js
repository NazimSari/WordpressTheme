import { registerBlockType } from "@wordpress/blocks";
import { __ } from "@wordpress/i18n";
import { RichText } from "@wordpress/block-editor";
import Edit from "./edit";

registerBlockType("evolution-blocks/heading-with-icon", {
  title: __("Heading with Icon", "evolution"),
  icon: "admin-customizer",
  category: "evolution",
  attributes: {
    option: {
      type: "string",
      default: "dos",
    },
    content: {
      type: "string",
      source: "html",
      selector: "h4",
      default: __("Dos", "evolution"),
    },
  },
  edit: Edit,
  save({ attributes: { content } }) {
    return (
      <div className="evolution-icon-heading">
        <span className="evolution-icon-heading__heading" />
        <RichText.Content tagName="h4" value={content} />
      </div>
    );
  },
});
