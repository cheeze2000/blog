# frozen_string_literal: true

class MarkdownViewerComponent < ViewComponent::Base
  include PostsHelper

  def initialize(md_content:)
    @md_content = md_content
  end
end
