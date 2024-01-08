import { RichText } from "@wordpress/block-editor";

const Edit = ({ className, attributes, setAttributes }) => {
  const { content } = attributes;
  return (
    <div className="evolution-icon-heading">
      <span className="evolution-icon-heading__heading" />
      <RichText
        tagName="h4"
        className={className}
        value={content}
        onChange={(content) => setAttributes({ content })}
        placeholder={__("Heading...", "evolution")}
      />
    </div>
  );
};

export default Edit;
