# frozen_string_literal: true

class PostHeaderComponent < ViewComponent::Base
  def initialize(post:)
    @post = post
  end
end
