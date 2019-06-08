<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\Sylius\Component\Attribute\AttributeType;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Component\Attribute\AttributeType\AttributeTypeInterface;
use Sylius\Component\Attribute\AttributeType\TextAttributeType;
use Sylius\Component\Attribute\Model\AttributeInterface;
use Sylius\Component\Attribute\Model\AttributeValueInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Violation\ConstraintViolationBuilderInterface;

final class TextAttributeTypeSpec extends ObjectBehavior
{
    function it_is_initializable(): void
    {
        $this->shouldHaveType(TextAttributeType::class);
    }

    function it_implements_attribute_type_interface(): void
    {
        $this->shouldImplement(AttributeTypeInterface::class);
    }

    function its_storage_type_is_text(): void
    {
        $this->getStorageType()->shouldReturn('text');
    }

    function its_type_is_text(): void
    {
        $this->getType()->shouldReturn('text');
    }

    function it_checks_if_attribute_value_is_valid_according_to_min_and_max_constraint(
        AttributeInterface $attribute,
        AttributeValueInterface $attributeValue,
        ConstraintViolationBuilderInterface $constraintViolationBuilder,
        ConstraintViolationInterface $constraintViolation,
        ConstraintViolationListInterface $constraintViolationList,
        ExecutionContextInterface $context,
        ValidatorInterface $validator
    ): void {
        $attributeValue->getAttribute()->willReturn($attribute);

        $attributeValue->getValue()->willReturn('X');

        $context->getValidator()->willReturn($validator);
        $validator->validate('X', Argument::containing(Argument::type(Length::class)))->willReturn($constraintViolationList);

        $constraintViolationList->rewind()->shouldBeCalled();
        $constraintViolationList->valid()->willReturn(true, false);
        $constraintViolationList->current()->willReturn($constraintViolation);
        $constraintViolationList->next()->shouldBeCalled();

        $constraintViolation->getMessage()->willReturn('error message');

        $context->buildViolation('error message')->willReturn($constraintViolationBuilder);
        $constraintViolationBuilder->atPath('value')->willReturn($constraintViolationBuilder);
        $constraintViolationBuilder->addViolation()->shouldBeCalled();

        $this->validate($attributeValue, $context, ['min' => 2, 'max' => 255]);
    }

    function it_checks_if_attribute_value_is_valid_according_to_required_constraint(
        AttributeInterface $attribute,
        AttributeValueInterface $attributeValue,
        ConstraintViolationBuilderInterface $constraintViolationBuilder,
        ConstraintViolationInterface $constraintViolation,
        ConstraintViolationListInterface $constraintViolationList,
        ExecutionContextInterface $context,
        ValidatorInterface $validator
    ) {
        $attributeValue->getAttribute()->willReturn($attribute);

        $attributeValue->getValue()->willReturn(null);

        $context->getValidator()->willReturn($validator);
        $validator->validate(null, Argument::containing(Argument::type(NotBlank::class)))->willReturn($constraintViolationList);

        $constraintViolationList->rewind()->shouldBeCalled();
        $constraintViolationList->valid()->willReturn(true, false);
        $constraintViolationList->current()->willReturn($constraintViolation);
        $constraintViolationList->next()->shouldBeCalled();

        $constraintViolation->getMessage()->willReturn('error message');

        $context->buildViolation('error message')->willReturn($constraintViolationBuilder);
        $constraintViolationBuilder->atPath('value')->willReturn($constraintViolationBuilder);
        $constraintViolationBuilder->addViolation()->shouldBeCalled();

        $this->validate($attributeValue, $context, ['required' => true]);
    }
}