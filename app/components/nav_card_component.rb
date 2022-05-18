# frozen_string_literal: true

class NavCardComponent < ViewComponent::Base
  def initialize(prev_page:, next_page:)
    @prev_page = prev_page
    @next_page = next_page
  end
end
